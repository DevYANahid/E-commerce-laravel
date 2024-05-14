$(function () {
    var myLatLng;
    $.ajax({
        type: 'Get',
        url: 'show-map-location',
        success:function (data) {

            var location = data;
            if (jQuery.isEmptyObject(location) == true){
                var lng = 90.399452;
                var lat = 23.777176;
                myLatLng = {
                    lng,lat
                };
            }else {
                var lng = location.lng;
                var lat = location.lat;
                myLatLng = {
                    lng,lat
                };
            }
            showMap(myLatLng);
        }
    });


    function showMap(myLatLng) {
        mapboxgl.accessToken = 'pk.eyJ1IjoibG9uZG9uZHViYWlzaG9wcGluZyIsImEiOiJja2Z3dGhvbDYwbWN3MnhrMHgxZjJqNWMxIn0.u7kYN6Gg2ZiMtypJVzZiQg';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: myLatLng,
            zoom: 15.5,
            pitch: 45,
            bearing: -17.6,
            container: 'map',
            antialias: true
        });

        // Add zoom and rotation controls to the map.
        map.addControl(new mapboxgl.NavigationControl());

        var geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl
        });

        document.getElementById('geocoder').appendChild(geocoder.onAdd(map));

// Add geolocate control to the map.
        var geolocation = map.addControl(
            new mapboxgl.GeolocateControl({
                positionOptions: {
                    enableHighAccuracy: true
                },
                trackUserLocation: true
            })
        );
        var latlng;
        $('.saveLocationBtn').on('click',function () {
            if(geocoder.mapMarker != null){
                latlng = geocoder.mapMarker._lngLat;
            }else if(geolocation._easeOptions) {
                latlng = geolocation._easeOptions.center;
            }else {
                alert('Location Isn\'t Select Yet');
            }
            saveLocation(latlng);
        });
    }



    // Dl {lng: 90.26375209999998, lat: 23.852955000630544}
    // Dl {lng: 90.403409, lat: 23.784506}
    function saveLocation(latlng) {
        if(latlng != undefined){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'Post',
                url: 'add-location',
                data: {
                    'lng': latlng.lng,
                    'lat': latlng.lat,
                },
                success:function (data) {
                    // console.log(data);
                    location.reload();
                }
            });
        }
    }

});
