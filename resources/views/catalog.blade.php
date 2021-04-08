@include('partials/_head')
<body>
<div id="app">
    <App></App>
</div>
<div class="col-lg-9 offset-lg-3 cta-catalog d-flex flex-column justify-content-center pl-5 pr-5 text-center text-lg-left">
    <h5>Ai nevoie de o simulare ca sa te<br class="d-none d-lg-block"> convingi ca ai ales bine? Scrie-ne</h5>
    <a href="mailto:hello@mucca.ro">hello@mucca.ro</a>
</div>
@include("partials/_footer")
@include("partials/_scripts")
<script defer src="{{ asset('js/app.js') }}"></script>


</body>
</html>

