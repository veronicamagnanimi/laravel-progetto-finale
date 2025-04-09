@props(['work'])

<div class="card h-100 shadow-sm">
@if ($work->image)
        <img src="{{ asset('storage/' . $work->image) }}" alt="{{ $work->name }}" class="card-img-top card-image">
    @else
        <img src="{{ asset('images/default.jpg') }}" alt="Immagine non disponibile" class="card-img-top card-image">
    @endif
<div class="card-body text-center">
        <h5 class="card-title">{{ $work->name }}</h5>
        <p class="card-text"><strong>Pittore:</strong> {{ $work->painter->name }}</p>
        <p class="card-text"><strong>Anno:</strong> {{ $work->year }}</p>
        <p class="card-text"><strong>Luogo:</strong> {{ $work->location }}</p>
        <a href="{{ route('works.show', $work->id) }}" class="btn btn-warning btn-sm">Dettagli</a>
    </div>
</div>