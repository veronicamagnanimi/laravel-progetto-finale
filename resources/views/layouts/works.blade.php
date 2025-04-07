<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Raleway:wght@400;600&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="text-center my-4">
            @yield('title')
        </h1>

        @yield('content')
    </div>
</body>

</html>