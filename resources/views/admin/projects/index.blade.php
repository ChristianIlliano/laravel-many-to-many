@extends('layouts.admin')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Type</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Buttons</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->types }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('admin.projects.show', ['project' =>$item->slug]) }}"><i class="fa-solid fa-plus"></i></a>
                    </td>
                    <td>
                        <a  class="btn btn-primary" href="{{ route("admin.projects.edit", ["project" => $item->slug ])}}">Modifica</a>
                    </td>

                    <td>
                        <a  class="btn btn-primary" href="{{ route("admin.projects.show", ["project" => $item->slug ])}}">Dettagli</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
