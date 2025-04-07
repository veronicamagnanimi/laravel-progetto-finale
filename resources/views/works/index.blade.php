@extends ('layouts.app');
@section('title', 'Tutti i quadri')
@section('content')

<div class="container">
    <div class="section my-4">
        <h1 class="my-4">Opere</h1>
    <a class="btn btn-primary" href="{{ route('works.create') }}">Aggiungi</a>
    </div>
    <div class="row">
        @foreach ($works as $work)
            <div class="col-md-4 mb-4"> {{-- Tre card per riga su schermi medi --}}
                <x-card :work="$work" />
            </div>
        @endforeach
    </div>
</div>
@endsection