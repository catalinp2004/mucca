@include('partials/_head')

<body class="home-body">
    <div class="page-wrapper container-fluid">

        <div class="row home-row contact-row">

            <div class="welcome-section contact position-relative col-lg-6 d-flex flex-column justify-content-lg-between pad-left pad-right pad-right-home pad-top pad-bottom">

                @include('partials/_home_nav')

                <div>
                    <h1 class="my-5">Contact</h1>

                    <div class="contact mb-5 mb-md-0 mb-lg-5 mb-xl-0">
                        <div class="mb-5">
                            <a href="#"><img src="{{asset('img/icon_instagram.png')}}" srcset="{{asset('img/icon_instagram.svg')}} 1x" alt="icon-instagram" class="img-fluid contact-social-icon mr-3"></a>
                            <a href="#"><img src="{{asset('img/icon_linkedin.png')}}" srcset="{{asset('img/icon_linkedin.svg')}} 1x" alt="icon_linkedin" class="img-fluid contact-social-icon mr-3"></a>
                            <a href="#"><img src="{{asset('img/icon_waze.png')}}" srcset="{{asset('img/icon_waze.svg')}} 1x" alt="" class="img-fluid"></a>
                        </div>

                        <a href="mailto:hello@mucca.ro" class="d-block mb-3">hello@mucca.ro</a>
                        <a href="tel:+40758094410" class="d-block mb-3">0758 904 410</a>
                        <a href="#" class="d-block mb-5">Șos. Olteniței nr. 209, <br>Popești Leordeni, Ilfov, 077160</a>
                    </div>

                    <div class="links small d-flex">
                        <a href="#" class="mr-3">Date de identificare</a>
                        <a href="#" class="mr-3">Confidentialitate</a>
                        <a href="#">Cookies</a>
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
        var myLatLng = {lat: 44.388938, lng: 26.136833};
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
        var markerPos = {lat: 44.388938, lng: 26.136833};
        var marker = new google.maps.Marker({
            position: markerPos,
            map: map,
            icon: {
                url: '{{asset("img/marker.svg")}}',
                // scaledSize: new google.maps.Size(100, 100),
                // size: new google.maps.Size(200, 200),
                anchor: new google.maps.Point(84, 15),
                origin: new google.maps.Point(0, 0)
            },
            title: 'mucca'
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCoeOAfbHXymUstK4xvncZ7PEGiK0Pctk&callback=initMap" async defer></script>

</body>
</html>