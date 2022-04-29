<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Add a marker using a place name</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css"
    type="text/css">
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css">

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
            left: -0.5px;
        }

        #menu {
            position: absolute;
            background: #efefef;
            padding: 10px;
            font-family: 'Open Sans', sans-serif;
        }

        .modal-body {
            height: 500px;
        }

    </style>
</head>

<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
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
                </div>
            </div>
        </div>
    </div>


    <script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-language/v1.0.0/mapbox-gl-language.js'></script>
    <!-- <script src="../resources/js/app.js"></script> -->

    <script>
        var markers = []

        let agencies;
        axios
            .get('http://localhost:8080/2rProjecteDAW2b2122/public/api/Agencies')
            .then(response => {
                agencies = response.data;
            })
            .catch(error => {})
            .finally(function() {
                console.log(agencies);
                //mapa
                mapboxgl.accessToken =
                    'pk.eyJ1IjoiZGFucmVpbmEiLCJhIjoiY2wxa2gwMzB1MDAzYzNjcnZ2bGV2djVxcSJ9.I8gWSrktEj5MWgxUAfOc2w';
                const mapboxClient = mapboxSdk({
                    accessToken: mapboxgl.accessToken
                });
                const map = new mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/mapbox/streets-v11',
                    center: [2.1366094151360113, 41.41725955343567],
                    zoom: 10
                });
                for (let i in agencies) {
                    mapboxClient.geocoding
                        .forwardGeocode({
                            query: agencies[i].carrer + " , " + agencies[i].municipis.nom,
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



                            // Create a marker and add it to the map.
                            new mapboxgl.Marker(markers[i]).setLngLat(feature.center)
                                .setPopup(new mapboxgl.Popup({
                                        offset: 25
                                    }) // add popups
                                    .setHTML(agencies[i].nom + " , " + agencies[i].carrer))
                                .addTo(map);
                        })
                }

                // PONER EL MAPA EN ESPAÑOL DE ESPAÑA
                // const language = new MapboxLanguage();
                // map.addControl(language);

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
                        placeholder: '     Cercar aqui',
                        language: 'es-ES'
                    })
                );

                // Controles Rotatorios.
                map.addControl(new mapboxgl.NavigationControl());

                // Control de Rutas
                map.addControl(
                new MapboxDirections({
                accessToken: mapboxgl.accessToken,
                unit: 'metric',
                language: 'es',
                placeholderOrigin: "Escull el lloc d'inici ...",
	            placeholderDestination: "Escull el teu destí ...",
                profile: 'mapbox/driving'
                }),
                'bottom-right'
                );

                // Pantalla Completa
                map.addControl(new mapboxgl.FullscreenControl());

            })
    </script>
</body>

</html>
