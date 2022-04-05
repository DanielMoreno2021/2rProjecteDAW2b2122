Mapa prueba
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Add a marker using a place name</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }

    </style>
</head>

<body>
    <div id="map"></div>
    <script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiZGFucmVpbmEiLCJhIjoiY2wxa2gwMzB1MDAzYzNjcnZ2bGV2djVxcSJ9.I8gWSrktEj5MWgxUAfOc2w';
        const mapboxClient = mapboxSdk({
            accessToken: mapboxgl.accessToken
        });
        mapboxClient.geocoding
            .forwardGeocode({
                query: 'Caldes de Montbui, Barcelona',
                autocomplete: false,
                limit: 1
            })
            .send()
            .then((response) => {
                if (
                    !response ||
                    !response.body ||
                    !response.body.features ||
                    !response.body.features.length
                ) {
                    console.error('Invalid response:');
                    console.error(response);
                    return;
                }
                const feature = response.body.features[0];

                const map = new mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/mapbox/streets-v11',
                    center: feature.center,
                    zoom: 10
                });

                // Create a marker and add it to the map.
                new mapboxgl.Marker().setLngLat(feature.center).addTo(map);
            });
    </script>
    {{-- <script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiZGFucmVpbmEiLCJhIjoiY2wxa2gwMzB1MDAzYzNjcnZ2bGV2djVxcSJ9.I8gWSrktEj5MWgxUAfOc2w';
        const map = new mapboxgl.Map({
            container: 'map', // container ID
            style: 'mapbox://styles/mapbox/light-v10', // style URL
            center: [2.0402804137958968, 41.41015839313346], // starting position
            zoom: 8 // starting zoom
        });

        map.on('load', () => {
            // Add a data source containing GeoJSON data.
            map.addSource('maine', {
                'type': 'geojson',
                'data': {
                    'type': 'Feature',
                    'geometry': {
                        'type': 'Polygon',
                        // These coordinates outline Maine.
                        'coordinates': [
                            [

                                [0.5094766739237695, 40.523747852246835],
                                [0.17988685259890114, 40.74468681915712],
                                [0.2677774716188657, 40.99806951730367],
                                [0.20185950735389224, 41.134741043164325],
                                [0.7566690399174201, 42.59912276410092],
                                [0.6687784208974555, 42.84529154614789],
                                [0.7346963851624291, 42.853346114715976],
                                [1.3828897004346707, 42.67994145806531],
                                [1.4488076646996442, 42.44933149744168],
                                [1.5641641021633486, 42.44122444172641],
                                [1.7099114173871774, 42.49194829853149],
                                [1.9212197419319554, 42.4452781007235],
                                [2.0032294524333163, 42.35726437979518],
                                [2.248046080109621, 42.43913214056017],
                                [2.5691188193786245, 42.35771668588523],
                                [3.0309973705083695, 42.47321218167571],
                                [3.186864876516025, 42.43407563715989],
                                [3.1928619823802795, 42.36026240293255],
                                [3.333793970190255, 42.33588498363969],
                                [3.244836899870483, 42.220518318216875],
                                [3.1548803119066684, 42.236060748031456],
                                [3.1628764530590074, 42.13163103034996],
                                [3.2635801019745103, 41.854881917260876],
                                [2.2386202689766255, 41.30065412814581],
                                [0.8904673858279535, 40.87778447359519],
                                [0.8805726659717019, 40.602538033509234],



                                [0.5094766739237695, 40.523747852246835]



                            ]
                        ]
                    }
                }
            });

            // Add a new layer to visualize the polygon.
            map.addLayer({
                'id': 'maine',
                'type': 'fill',
                'source': 'maine', // reference the data source
                'layout': {},
                'paint': {
                    'fill-color': '#104069', // blue color fill
                    'fill-opacity': 0.1
                }
            });
            // Add a black outline around the polygon.
            map.addLayer({
                'id': 'outline',
                'type': 'line',
                'source': 'maine',
                'layout': {},
                'paint': {
                    'line-color': '#000',
                    'line-width': 3
                }
            });
        });
    </script> --}}

</body>

</html>
