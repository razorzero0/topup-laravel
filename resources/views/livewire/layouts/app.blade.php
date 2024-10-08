<!-- resources/views/components/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your App</title>
    @stack('styles')
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body x-init="initFlowbite();" class=" bg-gray-900">

    @include('livewire.layouts.home-navbar')
    {{ $slot }} <!-- Ini akan menampilkan konten dari Livewire component -->




    @include('livewire/layouts/footer')

    @livewireScripts
    @stack('scripts')

    @if (env('APP_VERSION') === 'beta')
        <script src="{{ asset('assets/js/ribbon-corner.js') }}"></script>
        <script>
            RibbonCorner.ribbonCorner({
                backgroundColor: "#ef2c2c",
                horizontalAlign: "left",
                toCorner: 60,
                fontSize: 13,
                height: 30,
                text: "⚠️ Beta Version"
            });
        </script>
    @endif
</body>

</html>
