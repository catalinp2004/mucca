@include('partials/_head')
<body>
    <div class="page-wrapper container-fluid info-page" id="app">

        <div class="row position-relative">

            <div class="welcome-section col-12 d-flex flex-column pad-left pad-right pad-top pad-bottom">

                @include('partials/_home_nav')

            </div>

            <div class="col-12 pad-left pad-right">
                <div class="row">
                    <div class="col-xl-4 mb-5 mb-xl-0 title-col">
                        <h2 class="mt-0 mb-0">Clienti</h2>
                    </div>

                    <div class="col-xl-8 clients-case d-flex justify-content-xl-end flex-wrap">
                        <div data-aos="fade-up" data-aos-duration="200">
                            <img src="{{asset('img/clients_circle.png')}}" class="img-fluid client-logo">
                        </div>
                        <div data-aos="fade-up" data-aos-delay="100" data-aos-duration="200">
                            <img src="{{asset('img/clients_triangle.png')}}" class="img-fluid client-logo">
                        </div>
                        <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="200">
                            <img src="{{asset('img/clients_square.png')}}" class="img-fluid client-logo">
                        </div>
                        <div data-aos="fade-up" data-aos-delay="300" data-aos-duration="200">
                            <img src="{{asset('img/clients_circle.png')}}" class="img-fluid client-logo">
                        </div>
                        <div data-aos="fade-up" data-aos-delay="400" data-aos-duration="200">
                            <img src="{{asset('img/clients_triangle.png')}}" class="img-fluid client-logo">
                        </div>
                        <div data-aos="fade-up" data-aos-delay="500" data-aos-duration="200">
                            <img src="{{asset('img/clients_square.png')}}" class="img-fluid client-logo">
                        </div>
                        <div data-aos="fade-up" data-aos-delay="600" data-aos-duration="200">
                            <img src="{{asset('img/clients_circle.png')}}" class="img-fluid client-logo">
                        </div>
                        <div data-aos="fade-up" data-aos-delay="700" data-aos-duration="200">
                            <img src="{{asset('img/clients_triangle.png')}}" class="img-fluid client-logo">
                        </div>
                        <div data-aos="fade-up" data-aos-delay="800" data-aos-duration="200">
                            <img src="{{asset('img/clients_square.png')}}" class="img-fluid client-logo">
                        </div>
                        <div data-aos="fade-up" data-aos-delay="900" data-aos-duration="200">
                            <img src="{{asset('img/clients_circle.png')}}" class="img-fluid client-logo">
                        </div>
                        <div data-aos="fade-up" data-aos-delay="1000" data-aos-duration="200">
                            <img src="{{asset('img/clients_triangle.png')}}" class="img-fluid client-logo">
                        </div>
                        <div data-aos="fade-up" data-aos-delay="1100" data-aos-duration="200">
                            <img src="{{asset('img/clients_square.png')}}" class="img-fluid client-logo">
                        </div>
                        <div data-aos="fade-up" data-aos-delay="1200" data-aos-duration="200">
                            <img src="{{asset('img/clients_circle.png')}}" class="img-fluid client-logo">
                        </div>
                        <div data-aos="fade-up" data-aos-delay="1300" data-aos-duration="200">
                            <img src="{{asset('img/clients_triangle.png')}}" class="img-fluid client-logo">
                        </div>
                        <div data-aos="fade-up" data-aos-delay="1400" data-aos-duration="200">
                            <img src="{{asset('img/clients_square.png')}}" class="img-fluid client-logo">
                        </div>
                        <div data-aos="fade-up" data-aos-delay="1500" data-aos-duration="200">
                            <img src="{{asset('img/clients_circle.png')}}" class="img-fluid client-logo">
                        </div>
                        <div data-aos="fade-up" data-aos-delay="1600" data-aos-duration="200">
                            <img src="{{asset('img/clients_triangle.png')}}" class="img-fluid client-logo">
                        </div>
                        <div data-aos="fade-up" data-aos-delay="1700" data-aos-duration="200">
                            <img src="{{asset('img/clients_square.png')}}" class="img-fluid client-logo">
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
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.20/lodash.min.js" integrity="sha256-ur/YlHMU96MxHEsy3fHGszZHas7NzH4RQlD4tDVvFhw=" crossorigin="anonymous"></script>

<script>
    AOS.init();
</script>

