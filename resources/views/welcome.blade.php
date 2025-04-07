@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
        <h1 class="display-5 fw-bold">
            Welcome to my portfolio <i class="bi bi-box"></i>
        </h1>

        <p class="col-md-8 fs-4">
            This is a preset package with Bootstrap 5 views for laravel projects including laravel breeze/blade. It works from laravel 9.x to the latest release 11.x.
            You can also use bootstrap icons out of the box.
        </p>
        <hr>
        <div class="social">
            <h4>Show my projects</h4>
            <a class="btn btn-warning" href="{{ route("works.index") }}">Projects</a>
        </div>
    </div>
</div>
@endsection