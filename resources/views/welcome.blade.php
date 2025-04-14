@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 bg-light" style="background: linear-gradient(135deg, #D3D3D3 0%, #FFFFFF 50%, #C99700 100%) !important;">
    <div class="container py-5">
        <div class="row align-items-center">
            <!-- Testo -->
            <div class="col-md-6 mb-4 mb-md-0">
                <h1 class="display-4 fw-bold mb-3" style="color: #C99700;">
                    Benvenuto nel portfolio artistico <i class="bi bi-brush"></i>
                </h1>

                <p class="lead">
                    L’arte è il filo invisibile che collega passato e presente, un linguaggio silenzioso che parla all’anima. Ogni opera è un frammento di emozione, un racconto impresso su tela che attraversa il tempo.
                </p>

                <p class="text-muted">
                    Questo spazio nasce per raccogliere e custodire quelle storie, dando nuova vita alla bellezza attraverso forme, colori e ispirazione.
                </p>
            </div>

            <!-- Immagine decorativa -->
            <div class="col-md-6 text-center">
                <img src="{{ asset('artistic-gallery.png') }}" alt="Arte e creatività" class="img-fluid rounded shadow-sm" style="max-height: 300px;">
            </div>
        </div>

        <hr class="my-5">

        <!-- Card sempre visibili -->
        <div class="row justify-content-center text-center g-4">
            <div class="col-md-4">
                <div class="p-4 bg-white rounded shadow-sm h-100 card-animated">
                    <h5 class="mb-3" style="color: #C99700;"><i class="bi bi-collection me-2"></i>Area Amministrazione</h5>
                    <p>Gestisci e modifica i tuoi progetti in modo semplice e intuitivo.</p>
                    <a class="btn btn-warning" href="{{ route('works.index') }}">Accedi</a>
                </div>
            </div>

            @auth
                @if (Auth::user()->is_admin)
                    <div class="col-md-4">
                        <div class="p-4 bg-white rounded shadow-sm h-100 card-animated">
                            <h5 class="mb-3" style="color: #C99700;"><i class="bi bi-person-lock me-2"></i>Pannello Admin</h5>
                            <p>Accedi agli strumenti di gestione avanzata del portfolio.</p>
                            <a class="btn btn-outline-warning" href="{{ route('works.index') }}">Vai al pannello</a>
                        </div>
                    </div>
                @else
                    <div class="col-md-4">
                        <div class="p-4 bg-white rounded shadow-sm h-100 card-animated">
                            <h5 class="mb-3" style="color: #C99700;"><i class="bi bi-easel me-2"></i>Area Utenti</h5>
                            <p>Esplora la galleria interattiva in un'esperienza moderna e coinvolgente.</p>
                            <a href="http://localhost:5174" target="_blank" class="btn btn-warning">Vai alla pagina</a>
                        </div>
                    </div>
                @endif
            @else
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100 card-animated">
                        <h5 class="mb-3" style="color: #C99700;"><i class="bi bi-easel me-2"></i>Area Utenti</h5>
                        <p>Esplora la galleria interattiva in un'esperienza moderna e coinvolgente.</p>
                        <a href="http://localhost:5174" target="_blank" class="btn btn-warning">Vai alla pagina</a>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</div>

@endsection








