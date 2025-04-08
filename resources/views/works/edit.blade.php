@extends('layouts.works')

@section('content')

<!-- indietro -->
<a href="{{ route('works.index') }}" class="position-absolute top-0 start-0 m-4 back-icon">
    <i class="bi bi-arrow-left-circle-fill fs-2"></i>
</a>

<h1 class="text-center my-3">Modifica il quadro</h1>

<!-- form -->
<div class="container d-flex justify-content-center my-4">
    <form action="{{ route('works.update', $work) }}" method="POST" class="work-form w-75" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $work->name }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="painter">Pittore</label>
            <select name="painter_id" id="painter_id" class="form-control" required>
                <option value="" disabled>Seleziona un pittore</option>
                @foreach ($painters as $painter)
                    <option value="{{ $painter->id }}" {{ $work->painter_id == $painter->id ? 'selected' : '' }}>
                        {{ $painter->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="year">Anno</label>
            <input type="number" name="year" id="year" class="form-control" value="{{ $work->year }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="location">Luogo</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ $work->location }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="image">Immagine</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($work->image)
        <div id="work-image">
            <img class="img-fluid w-25" src="{{ asset('storage/' . $work->image) }}" alt="{{ $work->name }}">
        </div>
        @endif
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
