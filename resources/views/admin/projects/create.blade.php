@extends('layouts.admin')

@section('content')
    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="mb-3">
            <label for="types" class="form-label">Tipo</label>
            <select name="type" id="type">
                <option value="">Selection</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
        </div>

        <div class="mb-3">
            <h4>Tecnologie</h4>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                @foreach ($technologies as $technology)
                    <input name="technologies[]" type="checkbox" class="btn-check" value={{ $technology->id }}
                        id={{ $technology->id }} autocomplete="off">
                    <label class="btn btn-outline-primary" for="Tech-{{ $technology->id }}">{{ $technology->name }}</label>
                @endforeach
            </div>
        </div>

        <button class="btn btn-success" type="submit">Aggiungi</button>
    </form>
@endsection
