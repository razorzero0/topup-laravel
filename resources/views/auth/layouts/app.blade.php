<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard Algoora</title>
    @livewireStyles

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-900 ">
    @yield('content')
</body>

</html>
