<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Caricamento degli asset compilati da Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Presto</title>

        <!--Swiper JS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <!--Lo slash alla fine serve se noi vogliamo utilizzare la CDN sui framework tipo react -->

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body>

    {{-- Navbar --}}
    <x-navbar />

    {{-- Contenuto principale --}}
    <div class="min-vh-100">
        {{ $slot }}
    </div>

    {{-- Footer --}}
    <x-footer />

        <!-- Swiper js-->
            <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

 <!--Font awesome-->
            <script src="https://kit.fontawesome.com/e68b4c7621.js"></script>



</body>
</html>

<!-- 
  Includo il file JavaScript di Bootstrap (bootstrap.bundle.min.js) che contiene
  sia il codice JS di Bootstrap sia Popper.js (necessario per gestire 
  dropdown, tooltip, modali e il funzionamento del bottone navbar-toggler).

  Questo script è essenziale per far funzionare correttamente i componenti interattivi
  di Bootstrap, come la navbar che si apre e chiude su dispositivi mobili.
-->
