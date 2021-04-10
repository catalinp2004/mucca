@include('partials/_head')

<body class="home-body">
    <div class="page-wrapper container-fluid">

        <div class="row home-row contact-row">

            <div class="welcome-section contact position-relative col-lg-6 d-flex flex-column justify-content-lg-between pad-left pad-right pad-right-home pad-top pad-bottom">

                @include('partials/_home_nav')

                <div>
                    <h1 class="mb-5">Contact</h1>

                    <div class="contact mb-5">
                        <a href="https://www.instagram.com/mucca_production_advertising/" target="_blank" rel="noopener"><img src="{{asset('img/icon_instagram.png')}}" srcset="{{asset('img/icon_instagram.svg')}} 1x" alt="icon-instagram" class="img-fluid contact-social-icon mr-3"></a>
                        <a href="https://www.linkedin.com/company/mucca-production-&-advertising" target="_blank" rel="noopener"><img src="{{asset('img/icon_linkedin.png')}}" srcset="{{asset('img/icon_linkedin.svg')}} 1x" alt="icon_linkedin" class="img-fluid contact-social-icon mr-3"></a>
                        <a href="https://ul.waze.com/ul?place=ChIJUfbnHjT_sUARM-tT5iPLnSo&ll=44.37161050%2C26.18120460&navigate=yes" target="_blank" rel="noopener"><img src="{{asset('img/icon_waze.png')}}" srcset="{{asset('img/icon_waze.svg')}} 1x" alt="" class="img-fluid"></a>
                    </div>
                    <div class="contact margin-bottom">
                        <a href="mailto:hello@mucca.ro" class="d-block mb-3">hello@mucca.ro</a>
                        <a href="tel:+40758094410" class="d-block mb-3">0758 904 410</a>
                        <a href="https://ul.waze.com/ul?place=ChIJUfbnHjT_sUARM-tT5iPLnSo&ll=44.37161050%2C26.18120460&navigate=yes" target="_blank" rel="noopener"" class="d-block">Șos. Olteniței nr. 209, <br>Popești Leordeni, Ilfov, 077160</a>
                    </div>

                    <div class="links small d-flex mb-5 mb-md-0">
                        <a href="{{ route('info') }}" class="mr-3">Date de identificare</a>
                        <a href="{{ route('info') }}#confidentialitate" class="mr-3">Confidentialitate</a>
                        <a href="{{ route('info') }}#cookies">Cookies</a>
                    </div>

                </div>


            </div>

            <div class="col-lg-6 px-0">
                <div id="map">
                </div>
            </div>
        </div>
    </div>

@include('partials/_scripts')

<script>
    function initMap() {
        var myLatLng = {lat: 44.3716105, lng: 26.1812046};
        var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 14,
            mapTypeControl: false,
            disableDefaultUI: true,
            styles: [
                {
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#444444"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#f2f2f2"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 45
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#88e9ad"
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                }
            ]
        });
        var markerPos = {lat: 44.3716105, lng: 26.1812046};
        var marker = new google.maps.Marker({
            position: markerPos,
            map: map,
            icon: {
                url: '{{asset("img/marker.svg")}}',
                scaledSize: new google.maps.Size(54, 60),
                size: new google.maps.Size(54, 60),
                anchor: new google.maps.Point(46, 15),
                origin: new google.maps.Point(0, 0)
            },
            title: 'mucca'
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCoeOAfbHXymUstK4xvncZ7PEGiK0Pctk&callback=initMap" async defer></script>

</body>
</html>