<nav>

    <div class="toggler-wrapper">

        <div class="navbar-brand d-block">
            <a href="{{route('home')}}"><img src="{{asset('img/logo_mucca.png')}}" srcset="{{asset('img/logo_mucca.svg')}} 1x" alt="logo-mucca"></a>
        </div>

        <button class="navbar-toggler pl-0 position-relative" data-target="#home-menu-collapse" onclick="collapseNav()">
            <img src="{{asset('img/toggler_bar.png')}}" srcset="{{asset('img/toggler_bar.svg')}} 1x" alt="toggler-bar" class="toggler-bar top-bar img-fluid d-block mb-2">
            <img src="{{asset('img/toggler_bar.png')}}" srcset="{{asset('img/toggler_bar.svg')}} 1x" alt="toggler-bar" class="toggler-bar middle-bar img-fluid d-block mb-2">
            <img src="{{asset('img/toggler_bar.png')}}" srcset="{{asset('img/toggler_bar.svg')}} 1x" alt="toggler-bar" class="toggler-bar bottom-bar img-fluid d-block">
        </button>
    </div>

    <div class="lang-switcher pad-right pad-right-home">
        @if(LaravelLocalization::getCurrentLocale() == 'ro')
            <span class="active">RO</span>
        @else
            <a rel="alternate" hreflang="ro" href="{{ LaravelLocalization::getLocalizedURL('ro', null, []) }}">RO</a>
        @endif
        |
        @if(LaravelLocalization::getCurrentLocale() == 'en')
            <span class="active">EN</span>
        @else
            <a rel="alternate" hreflang="en"
               href="{{ LaravelLocalization::getLocalizedURL('en', null, []) }}">EN</a>
        @endif
    </div>

    <div class="navbar-collapse d-flex flex-column justify-content-between align-items-start pad-left pad-right pad-top pad-bottom" id="home-menu-collapse">

        @include('partials/_nav-links')

        <div class="contact-nav">

            <div class="contact my-5">
                <a href="https://www.instagram.com/mucca_production_advertising/" target="_blank" rel="noopener"><img src="{{asset('img/icon_instagram.png')}}" srcset="{{asset('img/icon_instagram.svg')}} 1x" alt="icon-instagram" class="img-fluid d-inline-block mr-2"></a>
                <a href="https://www.linkedin.com/company/mucca-production-&-advertising" target="_blank" rel="noopener"><img src="{{asset('img/icon_linkedin.png')}}" srcset="{{asset('img/icon_linkedin.svg')}} 1x" alt="icon_linkedin" class="img-fluid d-inline-block"></a>
                <a href="mailto:hello@mucca.ro" class="d-block my-2">hello@mucca.ro</a>
                <a href="tel:+40758094410" class="d-block">+4&nbsp;0758&nbsp;094&nbsp;410</a>
            </div>
            <div class="links">
                <a href="{{route('info')}}" class="mr-3">{{__('Date de identificare')}}</a>
                <a href="{{route('info')}}#confidentialitate" onclick="collapseNav()" class="mr-3">{{__('Confidențialitate')}}</a>
                <a href="{{route('info')}}#cookies" onclick="collapseNav()">Cookies</a>
            </div>
        </div>
    </div>

</nav>
