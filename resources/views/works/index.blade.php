@extends ('layouts.app')
@section('title', 'Tutti i quadri')
@section('content')

<!-- hero img -->
<div class="hero-img position-relative text-white text-center">
        <img
          src="{{ asset('hero.png') }}" alt="hero" class="img-fluid w-100 hero-banner"/>
        <div class="hero-text position-absolute top-50 start-50 translate-middle">
          <h1>"Dipingerò i tuoi occhi quando conoscerò la tua anima"</h1>
          <h5>Amedeo Modigliani</h5>
        </div>
      </div>

      <!-- container -->
<div class="container">
    <div class="section my-4 text-center">
        <h1 class="my-4">Quadri</h1>
    <a class="btn btn-warning" href="{{ route('works.create') }}">Aggiungi</a>
    </div>

<!-- form di ricerca -->
<div class="container my-4 text-center">
    <form id="searchForm" action="{{ route('works.index') }}" method="GET" class="d-flex justify-content-center">
        <input
            type="text"
            id="searchInput"
            name="search"
            class="form-control w-25 me-2"
            placeholder="Cerca un quadro o un pittore..."
            value="{{ request('search') }}"
        >
        <button type="submit" class="btn btn-warning">Cerca</button>
    </form>

    <!-- messaggio di errore -->
    <div id="searchError" class="text-danger text-center mt-2" style="display: none;">
        Inserisci un titolo da cercare.
    </div>
</div>

   <!-- card + messaggi -->
<div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 justify-content-center">
        @if ($works->isEmpty() && request('search'))
            <div class="col-12 text-center">
                <p class="text-muted fs-5">
                    Nessun quadro o pittore corrispondente alla ricerca.
                </p>
                <a href="{{ route('works.index') }}" class="btn btn-warning mt-1 mb-4">Mostra tutte le opere</a>
            </div>
        @endif

        @foreach ($works as $work)
            <div class="col-md-4 mb-4">
                <x-card :work="$work" />
            </div>
        @endforeach
    </div>

    {{-- Bottone per tornare a tutte le opere anche se ci sono risultati --}}
    @if (request('search') && !$works->isEmpty())
        <div class="text-center mt-4">
            <a href="{{ route('works.index') }}" class="btn btn-warning mb-3">Mostra tutte le opere</a>
        </div>
    @endif
</div>

<!-- icon -->
<button class="scroll-to-top" onclick="scrollToTop()" aria-label="Torna su">
    <i class="bi bi-arrow-up-circle-fill fs-2"></i>
</button>

<!-- script icon -->
<script>
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('searchForm');
        const input = document.getElementById('searchInput');
        const error = document.getElementById('searchError');

        form.addEventListener('submit', function (e) {
            if (input.value.trim() === "") {
                e.preventDefault();
                error.style.display = 'block';
            } else {
                error.style.display = 'none';
            }
        });

        input.addEventListener('input', function () {
            if (input.value.trim() !== "") {
                error.style.display = 'none';
            }
        });
    });
</script>

@endsection