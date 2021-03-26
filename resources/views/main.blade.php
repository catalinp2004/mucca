@include('partials/_head')


<body @if(\Request::route()->getName() != 'home') class="home-body" @endif>


<body class="home-body">
<div  id="app" class="page-wrapper container-fluid">

    <div  @if(\Request::route()->getName() != 'home') class="home-body" @else class="row home-row" @endif>

        <div class="welcome-section position-relative col-lg-6 d-flex flex-column justify-content-between pad-left pad-right pad-right-home pad-top pad-bottom">
            @include('partials/_home_nav')
            @yield('welcome_section')
        </div>
        @yield('content')
    @if(\Request::route()->getName() != 'home')
        @include('partials/_footer')
    @endif
    </div>
</div>
    @include('partials/_scripts')
</body>
</html>
