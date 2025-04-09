@extends ('layouts.app')
@section('title', 'Tutti i quadri')
@section('content')

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
@endsection