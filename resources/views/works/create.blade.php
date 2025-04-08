@extends('layouts.works')

@section('content')

<!-- indietro -->
<a href="{{ route('works.index') }}" class="position-absolute top-0 start-0 m-4 back-icon">
    <i class="bi bi-arrow-left-circle-fill fs-2"></i>
</a>

<h1 class="text-center my-3">Aggiungi un quadro</h1>
<!-- form -->
<div class="container d-flex justify-content-center my-4">
    <form action="{{ route('works.store') }}" method="POST" class="work-form w-75" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="painter_id">Pittore</label>
            <select name="painter_id" id="painter_id" class="form-control" required>
                <option value="" disabled selected>Seleziona un pittore</option>
                @foreach ($painters as $painter)
                    <option value="{{ $painter->id }}">{{ $painter->name }}</option>
                @endforeach
                <option value="new">+ Aggiungi un nuovo pittore</option>
            </select>
        </div>

        <div class="form-group mt-3 d-none" id="new-painter-group">
            <label for="new_painter">Nuovo Pittore</label>
            <input type="text" name="new_painter" id="new_painter" class="form-control">
            <label for="new_painter_description" class="mt-2">Descrizione del Nuovo Pittore</label>
            <textarea name="new_painter_description" id="new_painter_description" class="form-control" rows="3"
                placeholder="Inserisci una descrizione per il nuovo pittore"></textarea>
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
            <label for="image">Immagine</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="description">Descrizione</label>
            <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
        </div>

        <div class="text-center mt-3">
            <button type="submit" class="btn btn-warning">Crea quadro</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('painter_id').addEventListener('change', function () {
        const newPainterGroup = document.getElementById('new-painter-group');
        if (this.value === 'new') {
            newPainterGroup.classList.remove('d-none');
            document.getElementById('new_painter').setAttribute('required', 'required');
            document.getElementById('new_painter_description').setAttribute('required', 'required');
        } else {
            newPainterGroup.classList.add('d-none');
            document.getElementById('new_painter').removeAttribute('required');
            document.getElementById('new_painter_description').removeAttribute('required');
        }
    });
</script>

@endsection
