@extends('plantillas.principal')

@section('titulodecadapagina')
    <title>Carta Trucada</title>
@endsection

@section('botoncerrarsesion')
    <form>
        <input type="button" class="btn btn-outline-dark" value="Cancel·lar Carta" onclick="history.go(-1)">
    </form>
@endsection

@section('bootstrap5.1')
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

        #modal_body_mapa {
            height: 800px;
        }

    </style>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
@endsection

@section('cssdecadapagina')
    {{-- <link rel="stylesheet" href="../resources/css/cartallamada.blade.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
@endsection

@section('contenido')
<div class="container cartallamada" id="app">

    <cartes-trucades-component :usuari="{{Auth::user()->id}}"></cartes-trucades-component>
</div>
@endsection

@section('javascript')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-language/v1.0.0/mapbox-gl-language.js'></script>
    <!-- <script src="../resources/js/app.js"></script> -->

    <script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    </script>

    <script>
        var markers = []

        let agencies;
        axios
            .get('http://localhost:80/2rProjecteDAW2b2122/public/api/Agencies')
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
@endsection
