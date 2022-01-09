<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="container">
    @component('components.shop__header')
    @endcomponent
    <main class="main">
        @yield('main')
    </main>
    @component('components.footer')
    @endcomponent
</body>

</html>

<script src="{{ asset('js/hamburger.js') }}"></script>