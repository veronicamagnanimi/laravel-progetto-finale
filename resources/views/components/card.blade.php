@props(['work'])

<div class="card h-100 shadow-sm">
<div class="card-body">
        <h5 class="card-title">{{ $work->name }}</h5>
        <p class="card-text"><strong>Pittore:</strong> {{ $work->painter }}</p>
        <p class="card-text"><strong>Anno:</strong> {{ $work->year }}</p>
        <p class="card-text"><strong>Luogo:</strong> {{ $work->location }}</p>
        <a href="{{ route('works.show', $work->id) }}" class="btn btn-primary btn-sm">Show</a>
    </div>
</div>