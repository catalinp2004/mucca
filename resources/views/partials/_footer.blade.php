<footer class="col-12 info-pages-footer">
    <div class="row">
        <div class="col-lg-3 pad-left d-flex align-items-center align-items-md-end align-items-lg-start flex-column flex-md-row flex-lg-column footer-col my-5">
            <img src="{{ asset('img/icon_logo_mucca.png') }}" srcset="{{ asset('img/icon_logo_mucca.png') }} 1x" alt="logo-mucca" class="img-fluid mb-lg-5 mr-4 mr-lg-0">
            <div class="social-icons d-flex my-3 my-md-0 mb-lg-5 mr-4 mr-lg-0">
                <a href="https://www.instagram.com/mucca_production_advertising/" target="_blank" rel="noopener">
                    <img src="{{ asset('img/icon_instagram.png') }}" srcset="{{ asset('img/icon_instagram.png') }} 1x" alt="icon-instagram" class="img-fluid mr-2">
                </a>
                <a href="https://www.linkedin.com/company/mucca-production-&-advertising" target="_blank" rel="noopener" >
                    <img src="{{ asset('img/icon_linkedin.png') }}" srcset="{{ asset('img/icon_linkedin.png') }} 1x" alt="icon-linkedin" class="img-fluid">
                </a>
            </div>
            <div class="d-flex flex-column flex-sm-row flex-lg-column">
                <a href="{{route('info')}}" class="mb-lg-2 mr-4 mr-lg-0 text-center text-sm-left">Date de identificare</a>
                <a href="{{route('info')}}#confidentialitate" class="mb-lg-2 mr-4 mr-lg-0 text-center text-sm-left">Confidentialitate</a>
                <a href="{{route('info')}}#cookies" class="mb-lg-2 mr-4 mr-lg-0 text-center text-sm-left">Cookies</a>
            </div>
        </div>
        <div class="col-lg-9 pt-5 pad-right bk-black white d-flex flex-column pad-left-mobile pl-lg-5">
            <div class="row">
                <div class="col-xl-8 mb-5 mb-xl-0">
                    <h2 id="footer-h2" class="mb-5 text-center text-md-left">Te gândești la un proiect pilot?</h2>
                    <div class="footer-contacts d-flex justify-content-center justify-content-md-start">
                        <img src="{{ asset('img/footer_arrow.png') }}" srcset="{{ asset('img/footer_arrow.png') }} 1x" alt="icon-arrow" class="img-fluid mr-3">
                        <a href="tel:+40758094410" class="mr-3 white"><strong>0758 904 410</strong></a>
                        <a href="mailto:hello@mucca.ro" class="mr-3 white">hello@mucca.ro</a>
                    </div>
                </div>
                <div class="col-xl-3 offset-xl-1 follow-case text-center text-md-left">
                    <p>Follow us</p>
                    <a href="https://www.instagram.com/mucca_production_advertising/" target="_blank" rel="noopener" class="d-block white">Instagram</a>
                    <a href="https://www.linkedin.com/company/mucca-production-&-advertising" target="_blank" rel="noopener" class="white">Linkedin</a>
                </div>
            </div>
            <div class="row mt-auto">
                <div class="col-12">
                    <span class="d-block text-center text-md-right mt-4 mt-lg-0 mb-5"><small>Copyright © 2021 Mucca. Powered by the Universe.</small></span>
                </div>
            </div>
        </div>
    </div>
</footer>
