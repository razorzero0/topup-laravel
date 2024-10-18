<!-- resources/views/components/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Algoora - Toko Digital Terpercaya untuk Top-Up Game</title>

        <!-- General SEO Meta Tags -->
        <meta name="description"
            content="Algoora adalah toko digital terpercaya yang menyediakan berbagai jenis top-up diamond untuk game populer seperti Mobile Legends, Free Fire, Honor of Kings, dan lainnya. Dengan layanan cepat dan aman, Algoora memastikan kebutuhan top-up Anda terpenuhi dengan mudah dan nyaman.">
        <meta name="keywords"
            content="Algoora, toko digital, top-up game, Mobile Legends, Free Fire, Honor of Kings, top-up diamond, layanan top-up cepat, top-up aman">
        <meta name="author" content="Algoora">

        <!-- Open Graph / Facebook -->
        <meta property="og:title" content="Algoora - Toko Digital Terpercaya untuk Top-Up Game">
        <meta property="og:description"
            content="Toko digital terpercaya untuk top-up diamond game populer seperti Mobile Legends, Free Fire, Honor of Kings. Layanan cepat dan aman!">
        <meta property="og:image" content="{{ asset('assets/img/logo/logo-min.jpg') }}">
        <meta property="og:url" content="{{ env('APP_URL') }}">
        <meta property="og:type" content="website">

        <!-- Twitter Meta Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Algoora - Toko Digital Terpercaya untuk Top-Up Game">
        <meta name="twitter:description"
            content="Toko digital terpercaya yang menyediakan top-up diamond game populer dengan layanan cepat dan aman.">
        <meta name="twitter:image" content="{{ asset('assets/img/logo/logo-min.jpg') }}">

        <!-- WhatsApp Sharing Meta Tags -->
        <meta property="og:image" content="{{ asset('assets/img/logo/logo-min.jpg') }}">
        <meta property="og:description"
            content="Top-up diamond untuk Mobile Legends, Free Fire, Honor of Kings, dan lainnya di Algoora. Layanan cepat dan aman!">

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}" type="image/x-icon">

    </head>

    @stack('styles')
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body x-init="initFlowbite();" class="bg-gray-900 ">

    @include('livewire.layouts.home-navbar')
    {{ $slot }} <!-- Ini akan menampilkan konten dari Livewire component -->




    @stack('scripts')
    @include('livewire.layouts.footer')

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
