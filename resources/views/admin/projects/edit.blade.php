@extends('layouts.admin')

@section("content")
    
<form action="{{ route("admin.projects.update", ["project" => $project->slug ]) }}" method="POST">
    @csrf
    @method("PUT")
    
    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input value="{{$project->title}}" type="text" class="form-control" id="title" name="title">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control" id="description" rows="3" name="description">{{$project->description}}</textarea>
    </div>

    <div class="mb-3">
        <h4>Tecnologie</h4>
        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
            @foreach ($technologies as $technology)
                <input @checked($project->technologies->contains($technology)) name="technologies[]" type="checkbox" class="btn-check" value={{ $technology->id }}
                    id="Technology-{{ $technology->id }}" autocomplete="off">
                <label class="btn btn-outline-primary" for="Technology-{{ $technology->id }}">{{ $technology->name }}</label>
            @endforeach
        </div>
    </div>

    <button type="submit">Aggingi</button>
</form>

@endsection