@include('partials/_head')

<body>

<div class="page-wrapper container-fluid info-page">

    <div class="row position-relative">

        <div class="welcome-section col-12 d-flex flex-column pad-left pad-right pad-top pad-bottom">

            @include('partials/_home_nav')

        </div>

        <div class="col-12 pad-left pad-right">
            <div class="row">
                <div class="col-xl-3 mb-5 mb-xl-0 title-col">
                    <h2 class="mt-0 mb-0">{{__('Clienți')}}</h2>
                </div>

                <div class="col-xl-9 clients-case d-flex flex-wrap">
                    <div data-aos="fade-up" data-aos-offset="-100" data-aos-duration="200" class="col-6 col-sm-4 col-md-3 d-flex justify-content-center align-items-center flex-wrap client-logo">
                        <img src="{{ asset('img/logo_hoya.png') }}" srcset="{{ asset('img/logo_hoya.svg') }} 1x" alt="logo-hoya" class="img-fluid">
                    </div>
                    <div data-aos="fade-up" data-aos-offset="-100" data-aos-delay="100" data-aos-duration="200" class="col-6 col-sm-4 col-md-3 d-flex justify-content-center align-items-center flex-wrap client-logo">
                        <img src="{{ asset('img/logo_techhub.png') }}" srcset="{{ asset('img/logo_techhub.svg') }} 1x" alt="logo-techhub" class="img-fluid">
                    </div>
                    <div data-aos="fade-up" data-aos-offset="-100" data-aos-delay="200" data-aos-duration="200" class="col-6 col-sm-4 col-md-3 d-flex justify-content-center align-items-center flex-wrap client-logo">
                        <img src="{{ asset('img/logo_lastrada.png') }}" srcset="{{ asset('img/logo_lastrada.svg') }} 1x" alt="logo-lastrada" class="img-fluid">
                    </div>
                    <div data-aos="fade-up" data-aos-offset="-100" data-aos-delay="300" data-aos-duration="200" class="col-6 col-sm-4 col-md-3 d-flex justify-content-center align-items-center flex-wrap client-logo">
                        <img src="{{ asset('img/logo_uipath_foundation.png') }}" srcset="{{ asset('img/logo_uipath_foundation.svg') }} 1x" alt="logo-uipath-foundation" class="img-fluid">
                    </div>
                    <div data-aos="fade-up" data-aos-offset="-100" data-aos-delay="400" data-aos-duration="200" class="col-6 col-sm-4 col-md-3 d-flex justify-content-center align-items-center flex-wrap client-logo">
                        <img src="{{ asset('img/logo_threepharm.png') }}" srcset="{{ asset('img/logo_threepharm.svg') }} 1x" alt="logo-threepharm" class="img-fluid">
                    </div>
                    <div data-aos="fade-up" data-aos-offset="-100" data-aos-delay="500" data-aos-duration="200" class="col-6 col-sm-4 col-md-3 d-flex justify-content-center align-items-center flex-wrap client-logo">
                        <img src="{{ asset('img/logo_boltfood.png') }}" srcset="{{ asset('img/logo_boltfood.svg') }} 1x" alt="logo-bolt-food" class="img-fluid">
                    </div>
                    <div data-aos="fade-up" data-aos-offset="-100" data-aos-delay="600" data-aos-duration="200" class="col-6 col-sm-4 col-md-3 d-flex justify-content-center align-items-center flex-wrap client-logo">
                        <img src="{{ asset('img/logo_hofsteter.png') }}" srcset="{{ asset('img/logo_hofsteter.svg') }} 1x" alt="logo-hofsteter" class="img-fluid">
                    </div>
                    <div data-aos="fade-up" data-aos-offset="-100" data-aos-delay="700" data-aos-duration="200" class="col-6 col-sm-4 col-md-3 d-flex justify-content-center align-items-center flex-wrap client-logo">
                        <img src="{{ asset('img/logo_sameday.png') }}" srcset="{{ asset('img/logo_sameday.svg') }} 1x" alt="logo-sameday" class="img-fluid">
                    </div>
                    <div data-aos="fade-up" data-aos-offset="-100" data-aos-delay="800" data-aos-duration="200" class="col-6 col-sm-4 col-md-3 d-flex justify-content-center align-items-center flex-wrap client-logo">
                        <img src="{{ asset('img/logo_esolutions.png') }}" srcset="{{ asset('img/logo_esolutions.svg') }} 1x" alt="logo-esolutions" class="img-fluid">
                    </div>
                    <div data-aos="fade-up" data-aos-offset="-100" data-aos-delay="900" data-aos-duration="200" class="col-6 col-sm-4 col-md-3 d-flex justify-content-center align-items-center flex-wrap client-logo">
                        <img src="{{ asset('img/logo_qualitycrops.png') }}" srcset="{{ asset('img/logo_qualitycrops.svg') }} 1x" alt="logo-qualitycrops" class="img-fluid">
                    </div>
                    <div data-aos="fade-up" data-aos-offset="-100" data-aos-delay="1000" data-aos-duration="200" class="col-6 col-sm-4 col-md-3 d-flex justify-content-center align-items-center flex-wrap client-logo">
                        <img src="{{ asset('img/logo_htw.png') }}" srcset="{{ asset('img/logo_htw.svg') }} 1x" alt="logo-htw" class="img-fluid">
                    </div>
                    <div data-aos="fade-up" data-aos-offset="-100" data-aos-delay="1100" data-aos-duration="200" class="col-6 col-sm-4 col-md-3 d-flex justify-content-center align-items-center flex-wrap client-logo">
                        <img src="{{ asset('img/logo_corso.png') }}" srcset="{{ asset('img/logo_corso.svg') }} 1x" alt="logo-corso" class="img-fluid">
                    </div>
                    <div data-aos="fade-up" data-aos-offset="-100" data-aos-delay="1200" data-aos-duration="200" class="col-6 col-sm-4 col-md-3 d-flex justify-content-center align-items-center flex-wrap client-logo">
                        <img src="{{ asset('img/logo_jsleague.png') }}" srcset="{{ asset('img/logo_jsleague.svg') }} 1x" alt="logo-jsleague" class="img-fluid">
                    </div>
                    <div data-aos="fade-up" data-aos-offset="-100" data-aos-delay="1300" data-aos-duration="200" class="col-6 col-sm-4 col-md-3 d-flex justify-content-center align-items-center flex-wrap client-logo">
                        <img src="{{ asset('img/logo_axn.png') }}" srcset="{{ asset('img/logo_axn.svg') }} 1x" alt="logo-axn" class="img-fluid">
                    </div>
                    <div data-aos="fade-up" data-aos-offset="-100" data-aos-delay="1400" data-aos-duration="200" class="col-6 col-sm-4 col-md-3 d-flex justify-content-center align-items-center flex-wrap client-logo">
                        <img src="{{ asset('img/logo_xpert_beauty.png') }}" srcset="{{ asset('img/logo_xpert_beauty.svg') }} 1x" alt="logo-xpert_beauty" class="img-fluid">
                    </div>
                    <div data-aos="fade-up" data-aos-offset="-100" data-aos-delay="1500" data-aos-duration="200" class="col-6 col-sm-4 col-md-3 d-flex justify-content-center align-items-center flex-wrap client-logo">
                        <img src="{{ asset('img/logo_swanboy.png') }}" srcset="{{ asset('img/logo_swanboy.svg') }} 1x" alt="logo-swanboy" class="img-fluid">
                    </div>
                    <div data-aos="fade-up" data-aos-offset="-100" data-aos-delay="1600" data-aos-duration="200" class="col-6 col-sm-4 col-md-3 d-flex justify-content-center align-items-center flex-wrap client-logo">
                        <img src="{{ asset('img/logo_finland_embassy.png') }}" srcset="{{ asset('img/logo_finland_embassy.svg') }} 1x" alt="logo-finland_embassy" class="img-fluid">
                    </div>
                    <div data-aos="fade-up" data-aos-offset="-100" data-aos-delay="1700" data-aos-duration="200" class="col-6 col-sm-4 col-md-3 d-flex justify-content-center align-items-center flex-wrap client-logo">
                        <img src="{{ asset('img/logo_stepfwd.png') }}" srcset="{{ asset('img/logo_stepfwd.svg') }} 1x" alt="logo-stepfwd" class="img-fluid">
                    </div>
                    <div data-aos="fade-up" data-aos-offset="-100" data-aos-delay="1800" data-aos-duration="200" class="col-6 col-sm-4 col-md-3 d-flex justify-content-center align-items-center flex-wrap client-logo">
                        <img src="{{ asset('img/logo_euroanswer.png') }}" srcset="{{ asset('img/logo_euroanswer.svg') }} 1x" alt="logo-euroanswer" class="img-fluid">
                    </div>
                    <div data-aos="fade-up" data-aos-offset="-100" data-aos-delay="1900" data-aos-duration="200" class="col-6 col-sm-4 col-md-3 d-flex justify-content-center align-items-center flex-wrap client-logo">
                        <img src="{{ asset('img/logo_mbapharma.png') }}" srcset="{{ asset('img/logo_mbapharma.svg') }} 1x" alt="logo-mbapharma" class="img-fluid">
                    </div>
                    <div data-aos="fade-up" data-aos-offset="-100" data-aos-delay="2000" data-aos-duration="200" class="col-6 col-sm-4 col-md-3 d-flex justify-content-center align-items-center flex-wrap client-logo">
                        <img src="{{ asset('img/logo_postmodernism.png') }}" srcset="{{ asset('img/logo_postmodernism.svg') }} 1x" alt="logo-postmodernism" class="img-fluid">
                    </div>
                    <div data-aos="fade-up" data-aos-offset="-100" data-aos-delay="2100" data-aos-duration="200" class="col-6 col-sm-4 col-md-3 d-flex justify-content-center align-items-center flex-wrap client-logo">
                        <img src="{{ asset('img/logo_telepatnorth.png') }}" srcset="{{ asset('img/logo_telepatnorth.svg') }} 1x" alt="logo-telepatnorth" class="img-fluid">
                    </div>
                    <div data-aos="fade-up" data-aos-offset="-100" data-aos-delay="2200" data-aos-duration="200" class="col-6 col-sm-4 col-md-3 d-flex justify-content-center align-items-center flex-wrap client-logo">
                        <img src="{{ asset('img/logo_edenia.png') }}" srcset="{{ asset('img/logo_edenia.svg') }} 1x" alt="logo-edenia" class="img-fluid">
                    </div>
                    <div data-aos="fade-up" data-aos-offset="-100" data-aos-delay="2300" data-aos-duration="200" class="col-6 col-sm-4 col-md-3 d-flex justify-content-center align-items-center flex-wrap client-logo">
                        <img src="{{ asset('img/logo_planable.png') }}" srcset="{{ asset('img/logo_planable.svg') }} 1x" alt="logo-planable" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>



        @include('partials/_footer')

    </div>

</div>

@include('partials/_scripts')

<!-- ANIMATION SCRIPTS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
