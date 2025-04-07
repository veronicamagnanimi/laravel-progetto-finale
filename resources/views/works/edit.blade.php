@extends('layouts.works')
@section('title', 'Modifica il quadro')

@section('content')

    <!-- indietro -->
    <a href="{{ route('works.index') }}" class="position-absolute top-0 start-0 m-4 back-icon">
        <i class="bi bi-arrow-left-circle-fill fs-2"></i>
    </a>

    <!-- form -->
    <div class="d-flex justify-content-center">
        <form action="{{ route('works.update', $work) }}" method="POST" class="w-50" enctype="multipart/form-data">
            @csrf
            @METHOD('PUT')

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $work->name }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="painter">Pittore</label>
                <input type="text" name="painter" id="painter" class="form-control" value="{{ $work->painter }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="year">Anno</label>
                <input type="number" name="year" id="year" class="form-control" value="{{ $work->year }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="location">Luogo</label>
                <input type="text" name="location" id="location" class="form-control" value="{{ $work->location }}"
                    required>
            </div>

            <div class="form-group mt-3">
                <label for="description">Descrizione</label>
                <textarea name="description" id="description" class="form-control" rows="5"
                    required>{{ $work->description }}</textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-warning mt-3">Modifica quadro</button>
            </div>
        </form>
    </div>

@endsection