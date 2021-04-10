<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mucca - Playfully Committed</title>
    <meta name="description" content="Materiale publicitare si de vizibilitate.">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

</head>
