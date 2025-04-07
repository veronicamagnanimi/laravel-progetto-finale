@extends('layouts.works')
@section('title', 'Aggiungi un quadro')

@section('content')

    <div class="mt-3">
        <a href="{{ route('works.index') }}" class="btn btn-secondary btn-sm float-start">
            Indietro
        </a>
    </div>

    <!-- form -->
    <div class="d-flex justify-content-center">
        <form action="{{ route('works.store') }}" method="POST" class="w-50" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group mt-3">
                <label for="painter">Pittore</label>
                <input type="text" name="painter" id="painter" class="form-control" required>
            </div>

            <div class="form-group mt-3">
                <label for="year">Anno</label>
                <input type="number" name="year" id="year" class="form-control" required>
            </div>

            <div class="form-group mt-3">
                <label for="location">Luogo</label>
                <input type="text" name="location" id="location" class="form-control" required>
            </div>

            <div class="form-group mt-3">
                <label for="description">Descrizione</label>
                <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary mt-3">Crea quadro</button>
            </div>
        </form>
    </div>

@endsection