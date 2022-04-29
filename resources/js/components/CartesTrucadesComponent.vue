<template>
<main>
    <div class="container">
        <form>
        <div class="row">

            <!-- Tipus d'emergencia -->

        <label for="" class="col-2 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="What is your type of Emergency?">Tipus de Emergencia</label>
        <div class="col-4 dropdown d-grid gap-2">
            <select id="tipusIncident" name="tipusIncident" class="form-select" aria-label="Default select example" @change="actualitzarIncidents()">
                <option v-for="tipusincident in tipusincidents" :key="tipusincident.id">{{ tipusincident.descripcio }}</option>
            </select>
        </div>
        <!-- Una vegada s'ha seleccionat el tipus, mostrará les emergencies amb la mateixa id, totes dues són obligatories -->
        <label for="" class="col-2 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="What is your Emergency? / What do you need?">Emergencia</label>
        <div class="col-4 dropdown d-grid gap-2">
            <select id="incident" name="incident" class="form-select" aria-label="Default select example" v-model="cartaTrucada_incidents_id">
                <option v-for="incident in tipusincidents[posicio_incident_id].incidents" :key="incident.id" :value="incident.id"> {{ incident.descripcio}}</option>
            </select>
        </div>
    </div>

        <!-- Camp de nota comuna, es obligatori. -->
          <div class="form-group">
              <label for="exampleFormControlTextarea1">Nota Comuna</label>
              <textarea class="form-control textarea" id="nota_comuna" name="nota_comuna" v-model="cartaTrucada.nota_comuna" rows="1"></textarea>
          </div>

      <div class="mt-3 justify-content-between">
        <div class="row">

            <!-- Aquí es mostrará la localització seleccionada per l'usuari després d'obrir el mapa. -->

          <label for="" class="col-1 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="What is your Location?">Localització</label>
          <div class="col-3">
              <input type="" class="form-control" id="" readonly >
          </div>


            <!-- Botó d'obrir mapa -->
          <div class="col-5 d-grid gap-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" style="background-color: #104069" data-bs-target="#mapaModal">Obrir mapa</button>
          </div>

            <!-- En cas de que sigui fora de catalunya, es deshabilitaria les funcions de  provincia, comarca, municipi -->
            <div class="form-check col-3">
                <input class="form-check-input" type="checkbox" v-model="cartaTrucada_fora_catalunya" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Fora de Catalunya
                </label>
            </div>

        </div>
      </div>


      <div class="mt-3 justify-content-between">
          <div class="row">

            <label for="" class="col-1 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="What province are you in?">Provincia</label>
            <div class="col-3 dropdown d-grid gap-2">
                <select id="provincia" name="provincia" class="form-select" aria-label="Default select example" v-model="cartaTrucada_provincies_id" @change="actualitzarComarques()">
                    <option v-for="provincia in provincies" :key="provincia.id" :value="provincia.id">{{ provincia.nom }}</option>
                </select>
            </div>


            <label for="" class="col-1 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="What region are you in?">Comarca</label>
            <div class="col-3 dropdown d-grid gap-2">
            <select id="comarca" name="comarca" class="form-select" aria-label="Default select example" v-model="cartaTrucada_comarques_id" @change="actualitzarMunicipis()" disabled>
                <option v-for="comarca in provincies[posicio_provincia_id].comarques" :key="comarca.id" :value="comarca.id">{{ comarca.nom }}</option>
            </select>
            </div>

            <label for="" class="col-1 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="What municipality are you in?">Municipi</label>
            <div class="col-3 dropdown d-grid gap-2">
            <select id="municipi" name="municipi" class="form-select" aria-label="Default select example" v-model="cartaTrucada_municipis_id" disabled>
                <option v-for="municipi in provincies[posicio_provincia_id].comarques[posicio_comarca_id].municipis" :key="municipi.id" :value="municipi.id">{{ municipi.nom }}</option>
            </select>
            </div>

          </div>
      </div>

      <div class="mt-3 justify-content-between">
        <div class="row">

            <label for="" class="col-2 col-form-label">Descripció</label>
            <div class="col-4">
            <input type="" class="form-control" id="" v-model="cartaTrucada.descripcio_localitzacio" >
            </div>

            <label for="" class="col-2 col-form-label">Detalls</label>
            <div class="col-4">
            <input type="" class="form-control" id="" v-model="cartaTrucada.detall_localitzacio" >
            </div>

        </div>
    </div>
      <form>
          <div class="form-group">
              <label for="exampleFormControlTextarea1">Altres Referencies</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="cartaTrucada.altres_ref_localitzacio"></textarea>
          </div>
      </form>

      <div class="mt-3 justify-content-between">
        <div class="row">

            <label for="" class="col-2 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="What is your telephone number?">Telèfon</label>
            <div class="col-4">
            <input type="" class="form-control" id="" v-model="cartaTrucada_telefon" >
            </div>

            <label for="" class="col-2 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="What is your address?">Direcció</label>
            <div class="col-4">
            <input type="" class="form-control" id="" v-model="cartaTrucada_adreca_trucada" >
            </div>

        </div>
    </div>
      <div class="mt-3 justify-content-between">
          <div class="row">

              <label for="" class="col-2 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="What is your name?">Nom</label>
              <div class="col-4">
              <input type="" class="form-control" id="" v-model="cartaTrucada_nom_trucada" >
              </div>

          <div class="col-6 d-grid gap-2">
              <button id="buscarAntecedents" name="buscarAntecedents" type="button" class="btn btn-danger" style="background-color: #104069" data-bs-toggle="modal" data-bs-target="#modalAlertants">Buscar Antecedents</button>
              <button id="registrarPersona" name="registrarPersona" type="button" class="btn btn-danger d-none" style="background-color: #104069" @click="insertDadesPersonals()">Registrar</button>
          </div>
      </div>

      <div class="mt-3 justify-content-center">
          <div class="row">

          <div class="col-6 d-grid gap-2">
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalExpedients">Afegir a un Expedient</button>
          </div>
          <div class="col-6 d-grid gap-2">
              <button type="button" class="btn btn-danger" style="background-color: #104069" @click="insertCartaTrucadaExpedientNou()">Crear expedient nou</button>
          </div>
        </div>
      </div>
    </div>
        </form>
    </div>

    <!-- Modal Expedient
     -->

<div class="modal fade" id="modalExpedients" tabindex="-1" aria-labelledby="modalExpedientsLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalExpedientsLabel">Afegir a un expedient</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
        <div class="container" style="margin-top: 30px;">
            <div class="row">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Codi</td>
                            <td>Data de Creació</td>
                            <td>Data de Modificació</td>
                            <td>Estat</td>
                            <td>Edició</td>
                        </tr>
                    </thead>
                    <tbody>

                        <tr v-for="expedient in expedientsLlista" :key="expedient.id">

                            <td>{{expedient.id}}</td>
                            <td>{{expedient.data_creacio}}</td>
                            <td>{{expedient.data_ultima_modificacio}}</td>
                            <td>{{expedient.estats_expedients.estat}}</td>
                            <td>
                                <div class="d-grid gap-2 d-md-block">
                                    <button class="btn btn-success" data-bs-dismiss="modal" type="button" @click="escollirExpedient(expedient.id)">Afegir</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>
      </div>
    </div>
  </div>
</div>

   <!-- Modal Alertants
     -->

<div class="modal fade" id="modalAlertants" tabindex="-1" aria-labelledby="modalAlertantsLabel" aria-hidden="true">
  <div ref="modalAlertantsRef" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAlertantsLabel">Afegir a un expedient</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
        <div class="container" style="margin-top: 30px;">
            <div class="row">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Telefon</td>
                            <td>Adreça</td>
                            <td>Nom</td>
                            <td>Antecedents</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>

                        <tr v-for="alertant in dadesPersonalsLlista" :key="alertant.id">

                            <td>{{alertant.id}}</td>
                            <td>{{alertant.telefon}}</td>
                            <td>{{alertant.adreca}}</td>
                            <td>{{alertant.nom}}</td>
                            <td>{{alertant.antecedents}}</td>
                            <td>
                                <div class="d-grid gap-2 d-md-block">
                                    <button id="btnAlertantTancar" class="btn btn-success" type="button" data-bs-dismiss="modal" @click="insertAlertantsAntecedents(alertant)">Afegir</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>
      </div>
    </div>
  </div>
</div>


 <!-- Modal Error
     -->

<div class="modal fade" id="modalError" tabindex="-1" aria-labelledby="modalErrorLabel" aria-hidden="true">
  <div ref="modalErrorRef" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalErrorLabel">Error</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="mensajeError">

      </div>
    </div>
  </div>
</div>


<!-- Modal Mapa-->
    <div class="modal fade" id="mapaModal" tabindex="-1" aria-labelledby="mapaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div id= "modal_body_mapa" class="modal-body">
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


</main>
</template>

<script>
export default {
        props: {
            usuari: {
                type: Number,
                required: true
            }
        },
        data() {
            return {
                cartaTrucada: {

                    //Por defecto será 500, se debería poder hacer auto increment
                    codi_trucada: 500,
                    data_hora: null,
                    temps_trucada: "",
                    dades_personals_id: "",
                    telefon: "",

                    //Por defecto se introduciran valores
                    procedencia_trucada: "Defecto",
                    origen_trucada: "Defecto",
                    nom_trucada: "",
                    municipis_id_trucada: "",
                    adreca_trucada: "",
                    fora_catalunya: false,
                    provincies_id: "",
                    municipis_id: "",
                    //Por defecto va a ser siempre una calle.
                    tipus_localitzacions_id: "1",
                    descripcio_localitzacio: "",
                    detall_localitzacio: "",
                    altres_ref_localitzacio: "",
                    incidents_id: "",
                    nota_comuna: "",
                    expedients_id: "",
                    usuaris_id: ""

                },
                //PARA CREAR EXPEDIENTE NUEVO
                expedients: {
                    id: "",
                    data_creacio: "",
                    data_ultima_modificacio: "",
                    estats_expedients_id: 1

                },
                dadesPersonals: {
                    id: "",
                    telefon: "",
                    adreca: "",
                    nom: "",
                    antecedents: "",
                },
                //PARA RECOGER LA LISTA DE EXPEDIENTES
                expedientsLlista: [],
                dadesPersonalsLlista: [],
                tipusincidents: [],
                provincies: [],
                municipis: [],
                cartaTrucada_incidents_id: "",
                cartaTrucada_provincies_id: "",
                posicio_provincia_id: "0",
                posicio_previa: "0",
                primera_vegada: true,
                posicio_comarca_id: "0",
                posicio_incident_id: "0",
                cartaTrucada_municipis_id: "",
                cartaTrucada_comarques_id: "",
                cartaTrucada_telefon: "",
                cartaTrucada_adreca_trucada: "",
                cartaTrucada_nom_trucada: "",
                cartaTrucada_fora_catalunya: false,
                popUpError: false

            }
        },
        created() {
            let me = this;
                axios
                    .get('/tipusincidents')
                    .then(response => {
                        me.tipusincidents = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                    })
                    .finally(() => this.loading = false)
                axios
                .get('/provincies')
                .then(response => {
                    me.provincies = response.data;
                })
                .catch(error => {
                    console.log(error)
                })
                .finally(() => this.loading = false)
            axios
                    .get('/municipis')
                    .then(response => {
                        me.municipis = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                    })
                    .finally(() => this.loading = false)
                axios
                    .get('/expedients')
                    .then(response => {
                        me.expedientsLlista = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                    })
                    .finally(() => this.loading = false)
                axios
                    .get('/dadespersonals')
                    .then(response => {
                        me.dadesPersonalsLlista = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                    })
                    .finally(() => this.loading = false)



        },
        methods:{
            currentTime(){
                const current = new Date();
                const time = {"Hora":current.getHours(),"Minutos":current.getMinutes(),"Segundos":current.getSeconds()}


                return time;

            },
            currentDay(){
                const current = new Date();
                const time = current.getFullYear() +"-"+ (current.getMonth() + 1) +"-" + current.getUTCDate() +" " +current.getHours() + ":" + current.getMinutes() + ":" +current.getSeconds()


                return time;

            },
            actualitzarTempsTrucada(){


                    let horaActual = this.currentTime();

                    let horaComparada = horaActual["Hora"] - this.cartaTrucada.data_hora["Hora"];
                    let minutoComparado = horaActual["Minutos"] - this.cartaTrucada.data_hora["Minutos"];
                    let segundoComparado = horaActual["Segundos"] - this.cartaTrucada.data_hora["Segundos"];

                    horaComparada = horaComparada * 3600;
                    minutoComparado = minutoComparado * 60;
                    return horaComparada + minutoComparado + segundoComparado;


            },
            actualitzarIncidents(){
                //AQUÍ NECESITARIAMOS PASARLE LA ID DEL TIPO DE INCIDENTE COMO PARÁMETRO, Y EN EL CONTROLLER QUE BUSQUE POR TAL EN VEZ DE SER ALEATORIO.
                let me = this;

                me.posicio_incident_id = this.$el.querySelector("#tipusIncident").selectedIndex;

                me.cartaTrucada_incidents_id = "";

            },
            actualitzarComarques(){

                let me = this;


                me.posicio_provincia_id = this.$el.querySelector("#provincia").selectedIndex;
                me.cartaTrucada_comarques_id = "";
                me.cartaTrucada_municipis_id = "";



                document.getElementById("comarca").disabled = false;
                document.getElementById("municipi").disabled = true;




            },
            actualitzarMunicipis(){
                let me = this;
                if (me.posicio_provincia_id == me.posicio_previa){
                    document.getElementById("municipi").disabled = false;
                    me.posicio_comarca_id = this.$el.querySelector("#comarca").selectedIndex;

                }
                else if (me.primera_vegada){

                    document.getElementById("municipi").disabled = false;
                    me.posicio_comarca_id = this.$el.querySelector("#comarca").selectedIndex;
                    me.primera_vegada = false;

                }
                else {

                    document.getElementById("municipi").disabled = true;
                    me.posicio_comarca_id = "0";
                }


                me.posicio_previa = me.posicio_provincia_id
                me.cartaTrucada_municipis_id = "";


            },
            insertCartaTrucadaExpedientNou(){
                let me = this;

                me.actualitzarHora();

                me.crearExpedientNou();

                me.cartaTrucada.expedients_id = me.expedients.id;
                me.crearCartaTrucada();

            },
            actualitzarHora(){
                let me = this;
                //Compara la hora de inicio y la hora actual y devuelve los segundos totales.
                me.cartaTrucada.temps_trucada = this.actualitzarTempsTrucada();
                me.expedients.data_creacio = this.currentDay();
                me.expedients.data_ultima_modificacio = this.currentDay();
                me.cartaTrucada.data_hora = this.currentDay();
            },

            afegirCartaTrucadaAExpedient(){

                let me = this;

                axios
                    .post('/2rProjecteDAW2b2122/public/api/cartestrucades', me.cartaTrucada)
                    .then(response => {
                        console.log(response);
                        history.go(-1);
                    })
                    .catch(function(error) {
                        console.log(error.response.data.error);

                        let modalAlertants = new bootstrap.Modal(document.getElementById('modalError'), {
                            keyboard: false
                        });

                        document.getElementById("mensajeError").innerHTML = error.response.data.error;


                        modalAlertants.toggle();
                    })
                    .finally(() => this.loading = false)

            },
            crearExpedientNou(){
                let me = this;
                axios

                    .post('/2rProjecteDAW2b2122/public/api/expedients', me.expedients)
                    .then(function(response) {
                        me.expedients = response.data;
                    })
                    .catch(function(error) {

                        console.log(error.response.data.error);

                        let modalAlertants = new bootstrap.Modal(document.getElementById('modalError'), {
                            keyboard: false
                        });

                        document.getElementById("mensajeError").innerHTML = error.response.data.error;


                        modalAlertants.toggle();
                    })
                    .finally(() => this.loading = false)
            },
            crearCartaTrucada(){
                let me = this;
                axios
                    .post('/2rProjecteDAW2b2122/public/api/cartestrucades', me.cartaTrucada)
                    .then(response => {
                        console.log(response);
                        history.go(-1);
                    })
                    .catch(error => {


                        /*

                        let modalAlertants = new bootstrap.Modal(document.getElementById('modalError'), {
                            keyboard: false
                        });

                        document.getElementById("mensajeError").innerHTML = error.response.data.error;


                        modalAlertants.toggle(); */
                    })
                    .finally(() => this.loading = false)
            },
            insertDadesPersonals(){

                let me = this;
                me.dadesPersonals.telefon = me.cartaTrucada.telefon;
                me.dadesPersonals.adreca = me.cartaTrucada.adreca_trucada;
                me.dadesPersonals.nom = me.cartaTrucada.nom_trucada;
                me.dadesPersonals.antecedents = "Cap Antecedent";


                axios
                    .post('/dadespersonals', me.dadesPersonals)
                    .then(function(response) {
                        me.dadesPersonals = response.data;
                        me.cartaTrucada.dades_personals_id = me.dadesPersonals.id;
                        let modalAlertants = new bootstrap.Modal(document.getElementById('modalError'), {
                            keyboard: false
                        });

                        document.getElementById("mensajeError").innerHTML = "Registre de alertant completat!";
                        document.getElementById("modalErrorLabel").innerHTML = "Correcte";

                        modalAlertants.toggle();
                    })
                    .catch(function(error) {
                        console.log(error.response.data.error);

                        let modalAlertants = new bootstrap.Modal(document.getElementById('modalError'), {
                            keyboard: false
                        });

                        document.getElementById("mensajeError").innerHTML = error.response.data.error;


                        modalAlertants.toggle();
                    })
                    .finally(() => this.loading = false)



            },
            insertAlertantsAntecedents(alertant){
                let me = this;

                me.cartaTrucada_telefon = alertant.telefon;
                me.cartaTrucada_adreca_trucada = alertant.adreca;
                me.cartaTrucada_nom_trucada = alertant.nom;
                me.cartaTrucada.dades_personals_id = alertant.id;





            },
            escollirExpedient(id){
                let me = this;
                me.cartaTrucada.expedients_id = id;
                me.actualitzarHora();
                me.crearCartaTrucada();
            },
            //No se puede acceder desde el watch

            comprobarUsuari(){
                if (this.cartaTrucada.nom_trucada != "" && this.cartaTrucada.codi_trucada != "" && this.cartaTrucada.telefon != "")
                    {
                        document.getElementById("buscarAntecedents").classList.add("d-none");
                        document.getElementById("registrarPersona").classList.remove("d-none");

                    }
                else {
                    document.getElementById("buscarAntecedents").classList.remove("d-none");
                    document.getElementById("registrarPersona").classList.add("d-none");
                }

            }

        },
        watch:{
            //Recoge los datos que haya introducido el usuario.
            cartaTrucada_incidents_id: function(val)
                {
                    this.cartaTrucada.incidents_id = this.tipusincidents.find(valor => valor.id == val);
                    this.cartaTrucada.incidents_id = val;
                },
                idIncidentBuscar: function(val)
                {
                    this.incidents_id = val;
                },
            cartaTrucada_provincies_id: function(val)
                {
                    this.cartaTrucada.provincies_id = this.provincies.find(valor => valor.id == val);
                    this.cartaTrucada.provincies_id = val;

                },
                idProvinciaBuscar: function(val)
                {
                    this.provincies_id = val;
                },
            cartaTrucada_municipis_id: function(val)
                {
                    this.cartaTrucada.municipis_id = this.municipis.find(valor => valor.id == val);
                    this.cartaTrucada.municipis_id = val;
                    this.cartaTrucada.municipis_id_trucada = this.municipis.find(valor => valor.id == val);
                    this.cartaTrucada.municipis_id_trucada = val;
                },
                idMunicipiBuscar: function(val)
                {
                    this.municipis_id = val;
                    this.municipis_id_trucada = val;
                },

            //Al introducir datos de la carta de Trucada, si se introducen todos los datos,
            //se dará la opción de registrar en vez de la de seleccionar un antecedente.
            cartaTrucada_telefon: function (val)
                {

                    this.cartaTrucada.telefon = val;
                    //comprobarUsuari();
                    if (this.cartaTrucada.nom_trucada != "" && this.cartaTrucada.adreca_trucada != "" && this.cartaTrucada.telefon != "")
                    {
                        document.getElementById("buscarAntecedents").classList.add("d-none");
                        document.getElementById("registrarPersona").classList.remove("d-none");

                    }
                else {
                    document.getElementById("buscarAntecedents").classList.remove("d-none");
                    document.getElementById("registrarPersona").classList.add("d-none");
                }


                },
            cartaTrucada_nom_trucada: function (val)
                {

                    this.cartaTrucada.nom_trucada = val;
                    if (this.cartaTrucada.nom_trucada != "" && this.cartaTrucada.adreca_trucada != "" && this.cartaTrucada.telefon != "")
                    {
                        document.getElementById("buscarAntecedents").classList.add("d-none");
                        document.getElementById("registrarPersona").classList.remove("d-none");

                    }
                else {
                    document.getElementById("buscarAntecedents").classList.remove("d-none");
                    document.getElementById("registrarPersona").classList.add("d-none");
                }

                    //comprobarUsuari();

                },
            cartaTrucada_adreca_trucada: function (val)
                {

                    this.cartaTrucada.adreca_trucada = val;
                    if (this.cartaTrucada.nom_trucada != "" && this.cartaTrucada.adreca_trucada != "" && this.cartaTrucada.telefon != "")
                    {
                        document.getElementById("buscarAntecedents").classList.add("d-none");
                        document.getElementById("registrarPersona").classList.remove("d-none");

                    }
                else {
                    document.getElementById("buscarAntecedents").classList.remove("d-none");
                    document.getElementById("registrarPersona").classList.add("d-none");
                }

                    //comprobarUsuari();



                },
                //INCOMPLETO,ESTO ES PARA CUANDO SE PRESIONE EL BOTÓN DE FUERA DE CATALUÑA, SE SUPRIMAN LAS OPCIONES DE PROVINCIA, COMARCA Y MUNICIPIO
            cartaTrucada_fora_catalunya: function (val)
            {

                this.cartaTrucada.fora_catalunya = val;
                if (this.cartaTrucada.fora_catalunya)
                {
                    this.cartaTrucada_provincies_id = "";
                    this.cartaTrucada_comarques_id = "";
                    this.cartaTrucada_municipis_id = "";
                    this.primera_vegada = true;

                    document.getElementById("provincia").disabled = true;
                    document.getElementById("comarca").disabled = true;
                    document.getElementById("municipi").disabled = true;

                }
                else {

                    document.getElementById("provincia").disabled = false;
                }




            },

        },
        mounted() {

            this.cartaTrucada.data_hora = this.currentTime();
            this.cartaTrucada.usuaris_id = this.usuari;
            console.log('Component mounted.')
        }
    }
</script>
