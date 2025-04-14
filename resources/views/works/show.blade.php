@extends('layouts.works')
@section('content')

<div class="container my-5 d-flex justify-content-center">

    <!-- indietro -->
    <a href="{{ route('works.index') }}" class="position-absolute top-0 start-0 m-4 back-icon">
        <i class="bi bi-arrow-left-circle-fill fs-2"></i>
    </a>

    <!-- card -->
    <div class="card shadow-lg p-4 text-center w-75 work-details">
        <h2 class="fw-bold">{{ $work->name }}</h2>
        <h5 class="fst-italic">
            Dipinto da
            <a href="#" data-bs-toggle="modal" data-bs-target="#painterModal">
                {{ $work->painter->name }}
            </a>
        </h5>

        <!-- immagine -->
        @if ($work->image)
            <div class="my-4">
                <img src="{{ asset('storage/' . $work->image) }}" alt="{{ $work->name }}" class="img-fluid w-50">
            </div>
        @endif

        <p class="fs-4">{{ $work->year }}</p>
        <hr>
        <h5 class="mt-4">{{ $work->location }}</h5>
        <p class="lead">{{ $work->description }}</p>

        <hr class="my-2">

        <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">

            <!-- elimina -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Elimina
            </button>

            <!-- modifica -->
            <a href="{{ route('works.edit', $work) }}" class="btn btn-warning">
                Modifica
            </a>

            <!-- visiona in 3D -->
            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modal3D">
                Visiona in 3D
            </button>

        </div>

        <!-- modale 3d -->
        <div class="modal fade" id="modal3D" tabindex="-1" aria-labelledby="modal3DLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content p-3">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal3DLabel">Visione 3D: {{ $work->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                    </div>
                    <div class="modal-body text-center">
                        @if ($work->image)
                            <div class="image-3d-container">
                                <img src="{{ asset('storage/' . $work->image) }}" alt="{{ $work->name }}"
                                    class="img-fluid image-3d" style="max-height: 500px;">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <!-- modale delete -->
        <div class="modal" id="exampleModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Elimina quadro</h5>
                        <button type="button" class="btn-close modal-btn" data-bs-dismiss="modal"
                            aria-label="Chiudi"></button>
                    </div>
                    <div class="modal-body">
                        <p>Sei sicuro di eliminare il quadro?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-modal-secondary modal-btn"
                            data-bs-dismiss="modal">Chiudi</button>
                        <form action="{{ route('works.destroy', $work) }}" method="POST">
                            <input type="submit" class="btn btn-modal-danger modal-btn" value="Elimina">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- modale per la descrizione del pittore -->
        <div class="modal fade" id="painterModal" tabindex="-1" aria-labelledby="painterModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="painterModalLabel">{{ $work->painter->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ $work->painter->description }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Chiudi</button>
                    </div>
                </div>
            </div>
        </div> 