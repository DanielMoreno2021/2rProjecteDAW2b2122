Mapa prueba
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Add a marker using a place name</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
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

        #menu {
            position: absolute;
            background: #efefef;
            padding: 10px;
            font-family: 'Open Sans', sans-serif;
        }

    </style>
</head>

<body>
    <div id="map"></div>

    <div id="menu">
        <input id="satellite-v9" type="radio" name="rtoggle" value="satellite">
        <label for="satellite-v9">Satelite</label>
        <input id="light-v10" type="radio" name="rtoggle" value="light">
        <label for="light-v10">Clar</label>
        <input id="dark-v10" type="radio" name="rtoggle" value="dark">
        <label for="dark-v10">Obscur</label>
        <input id="streets-v11" type="radio" name="rtoggle" value="streets" checked="checked">
        <label for="streets-v11">Carrers</label>
        <input id="outdoors-v11" type="radio" name="rtoggle" value="outdoors">
        <label for="outdoors-v11">Afores</label>
    </div>
    
    <script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- <script src="../resources/js/app.js"></script> -->
    
    <script>
        let agencies;
         axios
            .get('http://localhost/2rProjecteDAW2b2122/public/api/Agencies')
            .then(response => {
                agencies = response.data;
            })
            .catch(error => {
        })
        .finally(function() {
            console.log(agencies);
             //mapa
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

                const layerList = document.getElementById('menu');
                const inputs = layerList.getElementsByTagName('input');
 
                for (const input of inputs) {
                input.onclick = (layer) => {
                const layerId = layer.target.id;
                map.setStyle('mapbox://styles/mapbox/' + layerId);
                };
                }

                // Add the control to the map.
                map.addControl(
                new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
                mapboxgl: mapboxgl,
                placeholder: 'Cercar aqui',
                language: 'es-ES'
                })
                );

                // Add zoom and rotation controls to the map.
                map.addControl(new mapboxgl.NavigationControl());
            });
        })
    </script>
</body>

</html>
