@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
        <h1 class="display-5 fw-bold">
            Welcome to my portfolio <i class="bi bi-box"></i>
        </h1>

        <p class="col-md-8 fs-4">
            L’arte è il filo invisibile che collega passato e presente, un linguaggio silenzioso che parla all’anima. Ogni opera è un frammento di emozione, un racconto impresso su tela che attraversa il tempo. Questo spazio nasce per raccogliere e custodire quelle storie, dando nuova vita alla bellezza attraverso forme, colori e ispirazione.
        </p>

        <hr>

        <div class="social d-flex flex-column gap-4">
            <!-- Pulsante sempre visibile -->
            <div>
                <h4>Show my projects</h4>
                <p class="mb-2">Esplora tutti i lavori presenti nel portfolio completo.</p>
                <a class="btn btn-warning" href="{{ route('works.index') }}">Projects</a>
            </div>

            @auth
                @if (Auth::user()->is_admin)
                    <!-- Se sei admin -->
                    <div>
                        <h4>Accesso amministratore</h4>
                        <p class="mb-2">Gestisci e modifica i tuoi progetti in modo semplice e intuitivo.</p>
                        <a class="btn btn-warning" href="{{ route('works.index') }}">Accedi</a>
                    </div>
                @else
                    <!-- Se sei un utente -->
                    <div>
                        <h4>Visita la nostra galleria interattiva</h4>
                        <p class="mb-2">Scopri un viaggio visivo tra opere uniche e suggestioni moderne in una pagina interamente dedicata all’esperienza artistica.</p>
                        <a href="http://localhost:5174" target="_blank" class="btn btn-warning">Vai alla pagina React</a>
                    </div>
                @endif
            @else
                <!-- Se non sei loggato -->
                <div>
                    <h4>Visita la nostra galleria interattiva</h4>
                    <p class="mb-2">Scopri un viaggio visivo tra opere uniche e suggestioni moderne in una pagina interamente dedicata all’esperienza artistica.</p>
                    <a href="http://localhost:5174" target="_blank" class="btn btn-warning">Vai alla pagina React</a>
                </div>
            @endauth
        </div>
    </div>
</div>

@endsection


