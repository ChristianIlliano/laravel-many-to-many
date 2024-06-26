@extends('layouts.admin')

@section("content")
    <div class="container m-5">

        <h1>{{ $project->title}}</h1>
        <p>{{ $project->description}}</p>
        <p>{{ $project->slug }}</p>

    </div>

    @foreach ($project->technologies as $tecnology)
        <p>{{ $tecnology->name }}</p>
    @endforeach

@endsection