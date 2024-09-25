<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard Algoora</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class=" bg-gray-900">
    @yield('content')
    @include('home/layouts/footer')
    @stack('scripts')
    <!--Start of Tawk.to Script-->

    <!--End of Tawk.to Script-->
</body>

</html>
