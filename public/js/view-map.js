var myLatLng;
$.ajax({
    type: 'Get',
    url: '/show-location',
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
        style: 'mapbox://styles/mapbox/streets-v11',
        center: myLatLng,
        zoom: 15.5,
        pitch: 45,
        bearing: -17.6,
        container: 'map',
        antialias: true
    });

    var marker = new mapboxgl.Marker()
        .setLngLat(myLatLng)
        .addTo(map);
// Add zoom and rotation controls to the map.
    map.addControl(new mapboxgl.NavigationControl());

    map.on('load', function () {
// Insert the layer beneath any symbol layer.
        var layers = map.getStyle().layers;

        var labelLayerId;
        for (var i = 0; i < layers.length; i++) {
            if (layers[i].type === 'symbol' && layers[i].layout['text-field']) {
                labelLayerId = layers[i].id;
                break;
            }
        }

        map.addLayer(
            {
                'id': '3d-buildings',
                'source': 'composite',
                'source-layer': 'building',
                'filter': ['==', 'extrude', 'true'],
                'type': 'fill-extrusion',
                'minzoom': 15,
                'paint': {
                    'fill-extrusion-color': '#aaa',

// use an 'interpolate' expression to add a smooth transition effect to the
// buildings as the user zooms in
                    'fill-extrusion-height': [
                        'interpolate',
                        ['linear'],
                        ['zoom'],
                        15,
                        0,
                        15.05,
                        ['get', 'height']
                    ],
                    'fill-extrusion-base': [
                        'interpolate',
                        ['linear'],
                        ['zoom'],
                        15,
                        0,
                        15.05,
                        ['get', 'min_height']
                    ],
                    'fill-extrusion-opacity': 0.6
                }
            },
            labelLayerId
        );
    });
}
