@include('partials/_head')
<body class="home-body">
    <div  id="app" class="page-wrapper container-fluid">

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

                <form class="form-inline search-form">

                    <div class="input-group" data-aos="fade-up" data-aos-duration="500" data-aos-delay="1500">
                        <input type="text" class="form-control" placeholder="COD PRODUS / CUVÂNT" aria-label="Username" aria-describedby="search">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="search"><img src="{{asset('img/icon_search.png')}}" srcset="{{asset('img/icon_search.svg')}} 1x" alt="icon-search" class="img-fluid"></span>
                            <span for="#search" class="search-span">Search</span>
                        </div>
                    </div>

                </form>

                <footer class="row d-lg-block d-xl-flex justify-content-between align-items-end">

                    <div class="col-md-3 col-lg-12 col-xl-3 contact mb-5 mb-md-0 mb-lg-5 mb-xl-0">
                        <img src="{{asset('img/icon_instagram.png')}}" srcset="{{asset('img/icon_instagram.svg')}} 1x" alt="icon-instagram" class="img-fluid d-inline-block mr-2">
                        <img src="{{asset('img/icon_linkedin.png')}}" srcset="{{asset('img/icon_linkedin.svg')}} 1x" alt="icon_linkedin" class="img-fluid d-inline-block">
                        <a href="mailto:hello@mucca.ro" class="d-block my-2">hello@mucca.ro</a>
                        <a href="tel:+40758094410" class="d-block">0758 904 410</a>
                    </div>

                    <div class="col-md-9 col-lg-12 col-xl-9 links d-flex align-items-end justify-content-md-end justify-content-lg-start justify-content-xl-end pl-xl-5">
                        <a href="route('catalog', ['category' => 'Office', 'search' => 'rocket'])" class="mr-3">Date de identificare</a>
                        <a href="#" class="mr-3">Confidentialitate</a>
                        <a href="#">Cookies</a>
                    </div>

                </footer>

            </div>

            <div class="categories-section col-lg-6 d-flex flex-column justify-content-center">
                <div class="row">
                    <div class="col-12 category-col d-flex flex-column justify-content-center align-items-center">
                        <h2 class="mb-4">Giveaways</h2>
                        <button class="btn btn-homepage">Da, asta vreau!</button>
                    </div>
                    <div class="col-12 category-col d-flex flex-column justify-content-center align-items-center">
                        <h2 class="mb-4">Much more</h2>
                        <button class="btn btn-homepage">Da, intru aici!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials/_scripts')
    <!-- ANIMATION SCRIPTS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.20/lodash.min.js" integrity="sha256-ur/YlHMU96MxHEsy3fHGszZHas7NzH4RQlD4tDVvFhw=" crossorigin="anonymous"></script>

    <script>
        AOS.init();
    </script>

