@include('partials/_head')

<body class="@yield('body_class')">

@yield('body_content')

@include("partials/_scripts")
@yield('scripts')

</body>
</html>