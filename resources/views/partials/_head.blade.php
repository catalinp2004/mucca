<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Mucca - Playfully Committed')</title>
    <meta name="description" content="@yield('desc', 'Mucca este o agenție de publicitate full service care se ocupă de implementarea proiectelor ce țin de producția publicitară.')">
    <meta name="keywords" content="Materiale publicitare, Materiale vizibilitate, Print digital, Print offset, Montaj Bucuresti, Materiale evenimente, SWAG, Sticker-e, Premii, Standuri expozitionale, Giveaways, Personalizare obiecte promotionale, Proiecte custom, Proiecte speciale, Productie publicitara, Event set up, Montaj evenimente, Creatie, DTP, Proiect pilot">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:type" content="website">
    <meta property="og:image" content="@yield('og_image', asset('og-image.jpg'))">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:title" content="@yield('title', 'Mucca - Playfully Committed')">
    <meta property="og:description" content="@yield('desc', 'Mucca este o agenție de publicitate full service care se ocupă de implementarea proiectelor ce țin de producția publicitară.')">
    <meta property="og:url" content="{{url()->current()}}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('img/icons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('img/icons/safari-pinned-tab.svg') }}" color="#65d07d">
    <link rel="shortcut icon" href="{{ asset('img/icons/favicon.ico') }}">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="msapplication-config" content="{{ asset('img/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#65d07d">
    
    <!-- ANIMATION LINKS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <noscript>
        <style type="text/css">
            [data-aos] {
                opacity: 1 !important;
                transform: translate(0) scale(1) !important;
            }
        </style>
    </noscript>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@v2.2/dist/cookieconsent.css">
    <!-- CSS STYLESHEET -->
    <link rel="stylesheet" text="text/css" href="{{ mix('css/app.css') }}">
    @yield('styles')

</head>
