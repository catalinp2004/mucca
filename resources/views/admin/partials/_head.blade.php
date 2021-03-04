<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>
    <meta name="Author" content="Mucca" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600" rel="stylesheet">
    
    <link rel="dns-prefetch" href="//use.fontawesome.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/solid.css" integrity="sha384-ioUrHig76ITq4aEJ67dHzTvqjsAP/7IzgwE7lgJcg2r7BRNGYSK0LwSmROzYtgzs" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/fontawesome.css" integrity="sha384-sri+NftO+0hcisDKgr287Y/1LVnInHJ1l+XC7+FOabmTTIK0HnE2ID+xxvJ21c5J" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_style.css') }}?v=0.15">
    
    @yield('styles')

</head>

@auth

<nav class="navbar navbar-light container-fluid large-pad">
    <a class="navbar-brand d-flex align-items-center" href="{{ route('admin.index') }}">
        <img src="{{ asset('img/mucca_icon.png') }}" alt="Mucca" srcset="{{ asset('img/mucca_icon.svg') }} 1x" class="mr-3">
        <span>Admin Tool</span>
    </a>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault(); if (confirm('Are you sure you want to log out?')) { document.getElementById('logout-form').submit(); }">
                <i class="fas fa-power-off"></i> {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>

@endauth
