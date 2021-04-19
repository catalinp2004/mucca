@include('partials/_head')

<body class="home-body">
<div class="page-wrapper container-fluid">

    <div class="row home-row">

        <div class="welcome-section position-relative col-lg-6 d-flex flex-column justify-content-between pad-left pad-right pad-right-home pad-top pad-bottom">

            @include('partials/_home_nav')
            <h1 class="h1-home">
                    <span class="typewriter">
                        <span class="span-1">What are you</span>
                    </span><br>
                <span class="typewriter">
                        <span class="span-2">looking for?</span>
                    </span>
            </h1>

            <form class="form-inline search-form" method="GET" action="/catalog">

                <div class="input-group" data-aos="fade-up" data-aos-duration="500" data-aos-delay="1500">
                    <input type="text" name="search" class="form-control" placeholder="{{__('COD PRODUS / CUVÂNT')}}" aria-label="Username" aria-describedby="search">
                    <div class="input-group-prepend">
                        <button class="home-submit" type="submit">
                            <span class="input-group-text" id="search"><img src="{{ asset('img/icon_search.png') }}" srcset="{{ asset('img/icon_search.svg') }} 1x" alt="icon-search" class="img-fluid"></span>
                        </button>
                        <label for="#search" class="search-label">Search</label>
                    </div>
                </div>

            </form>

            <footer class="row d-lg-block d-xl-flex justify-content-between align-items-end">

                <div class="col-md-3 col-lg-12 col-xl-3 contact mb-5 mb-md-0 mb-lg-5 mb-xl-0">
                    <a href="https://www.instagram.com/mucca_production_advertising/" target="_blank" rel="noopener"><img src="{{ asset('img/icon_instagram.png') }}" srcset="{{ asset('img/icon_instagram.svg') }} 1x" alt="icon-instagram" class="img-fluid d-inline-block mr-2"></a>
                    <a href="https://www.linkedin.com/company/mucca-production-&-advertising" target="_blank" rel="noopener"><img src="{{ asset('img/icon_linkedin.png') }}" srcset="{{ asset('img/icon_linkedin.svg') }} 1x" alt="icon_linkedin" class="img-fluid d-inline-block"></a>
                    <a href="mailto:hello@mucca.ro" class="d-block my-2">hello@mucca.ro</a>
                    <a href="tel:+40758094410" class="d-block">0758 904 410</a>
                </div>

                <div class="col-md-9 col-lg-12 col-xl-9 links d-flex align-items-end justify-content-md-end justify-content-lg-start justify-content-xl-end pl-xl-5">
                    <a href="{{ route('info') }}" class="mr-3">{{__('Date de identificare')}}</a>
                    <a href="{{ route('info') }}#confidentialitate" class="mr-3">{{__('Confidentialitate')}}</a>
                    <a href="{{ route('info') }}#cookies">Cookies</a>
                </div>

            </footer>

        </div>

        <div class="categories-section col-lg-6 d-flex flex-column justify-content-center">
            <div class="row">
                <div class="col-12 category-col d-flex flex-column justify-content-center align-items-center">
                    <h2 class="mb-4">Giveaways</h2>
                    <a href="{{route('catalog')}}" class="btn btn-homepage">{{__('Da, asta vreau!')}}</a>
                </div>
                <div class="col-12 category-col d-flex flex-column justify-content-center align-items-center">
                    <h2 class="mb-4">Much more</h2>
                    <a href="{{route('povestea')}}#servicii" class="btn btn-homepage">{{__('Da, intru aici!')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials/_scripts')

<!-- ANIMATION SCRIPTS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</body>
</html>
