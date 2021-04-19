@include('partials/_head')
<body>
<div id="app" class="d-flex flex-column">
    <App></App>
</div>
<div class="container-fluid">

    <div class="row">
        <div
            class="col-lg-9 offset-lg-3 cta-catalog d-flex flex-column justify-content-center pl-5 pr-5 text-center text-lg-left">
            @if (App::isLocale('ro'))
                <h5>Ai nevoie de o simulare ca sa te<br class="d-none d-lg-block"> convingi ca ai ales bine? Scrie-ne</h5>
            @else
                <h5>Do you need a simulation to make sure<br class="d-none d-lg-block"> you’ve choose right? Contact us!</h5>
            @endif
            <a href="mailto:hello@mucca.ro">hello@mucca.ro</a>
        </div>
    </div>
</div>
@include("partials/_footer")
@include("partials/_scripts")
<script src="{{ mix('js/app.js') }}"></script>


</body>
</html>

