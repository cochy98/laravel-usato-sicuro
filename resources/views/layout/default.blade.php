<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AutoDuelle - @yield('title')</title>
    {{-- Font awesome 6.1.1 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{--  Custom style --}}
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    {{-- Includo l'header  --}}
    @include('partials/header')

    <main>
        @yield('content')
    </main>
</body>
</html>
