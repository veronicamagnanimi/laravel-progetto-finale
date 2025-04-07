@extends('layouts.works')
@section('content')

<div class="container my-5 d-flex justify-content-center">
    <div class="card shadow-lg p-4 text-center w-75 work-details">
        <h2 class="fw-bold">{{ $work->name }}</h2>
        <h5 class="fst-italic">Dipinta da {{ $work->painter }}</h5>

        <p class="">{{ $work->year }}</p>
        <hr>
        <p>{{ $work->location }}</p>

        <section class="mt-4">
            <p class="lead">{{ $work->description }}</p>
        </section>

        <hr>

        <div class="buttons">
            <!-- elimina -->
            <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Elimina
            </button>

            <!-- modifica -->
            <a href="{{ route('works.edit', $work) }}" class="btn btn-warning mt-3">
                Modifica
            </a>

            <!-- indietro -->
            <div class="mt-3">
                <a href="{{ route('works.index') }}" class="btn btn-secondary btn-sm float-start">
                    Indietro
                </a>
            </div>
        </div>

        <!-- modale delete -->
        <div class="modal" id="exampleModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Elimina quadro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                    </div>
                    <div class="modal-body">
                        <p>Sei sicuro di eliminare il quadro?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                        <form action="{{ route('works.destroy', $work) }}" method="POST">
                            <input type="submit" class="btn btn-danger" value="Elimina">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
        </div>