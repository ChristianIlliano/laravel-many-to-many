<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Str;

use function PHPSTORM_META\type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $projects = Project::all();
        return view("admin.projects.index", compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view("admin.projects.create", compact("types","technologies"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newProject = new Project();
        $newProject->title = $data["title"];
        $newProject->type = $data["type"];
        $newProject->description = $data["description"];
        // $newProject->name =$data["name"];
        $newProject->slug = Str::slug($newProject->title);
        $newProject->save();

        if($request->has('technologies')) {
            $newProject->technologies()->attach($request->technologies);
        }

        return redirect()->route("admin.projects.index");
    } 


        public function show(Project $project)
    {
        return view("admin.projects.show", compact("project"));
    }
    
    /**
     * Display the specified resource.
     */
    // public function show(string $slug)
    // {
    //     $project = Project::where('slug', $slug)->first();
    //     if(!$project) {
    //         abort(404);
    //     }
    //     return view('admin.projects.show', compact('project'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view("admin.projects.edit", compact("project", "types", "technologies"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project, Type $type)
    {
        $project->title = $request->title;
        $project->type = $request->type;
        $project->description =$request->description;
        $project->slug = Str::slug($project->title);
        $project->save();
        return view('admin.projects.show', compact('project', "type"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}