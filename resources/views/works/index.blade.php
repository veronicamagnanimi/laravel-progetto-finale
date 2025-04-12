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

      <!-- card -->
<div class="container">
    <div class="section my-4 text-center">
        <h1 class="my-4">Quadri</h1>
    <a class="btn btn-warning" href="{{ route('works.create') }}">Aggiungi</a>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        @foreach ($works as $work)
            <div class="col-md-4 mb-4"> 
                <x-card :work="$work" />
            </div>
        @endforeach
    </div>
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
@endsection