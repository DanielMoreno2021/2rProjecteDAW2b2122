<template>
<main>
    <div class="container">
        <form>
        <div class="row">

        <label for="" class="col-2 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="What is your type of Emergency?">Tipus de Emergencia</label>
        <div class="col-4 dropdown d-grid gap-2">
            <select class="form-select" aria-label="Default select example" @change="actualitzarIncidents()">
                <option v-for="tipusincident in tipusincidents" :key="tipusincident.id">{{ tipusincident.descripcio }}</option>
            </select>
        </div>

        <label for="" class="col-2 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="What is your Emergency? / What do you need?">Emergencia</label>
        <div class="col-4 dropdown d-grid gap-2">
            <select id="incident" name="incident" class="form-select" aria-label="Default select example" v-model="cartaTrucada_incidents_id">
                <option v-for="incident in incidents" :key="incident.id" :value="incident.id"> {{ incident.descripcio}}</option>
            </select>
        </div>
    </div>

          <div class="form-group">
              <label for="exampleFormControlTextarea1">Nota Comuna</label>
              <textarea class="form-control textarea" id="nota_comuna" name="nota_comuna" v-model="cartaTrucada.nota_comuna" rows="1"></textarea>
          </div>

      <div class="mt-3 justify-content-between">
        <div class="row">

          <label for="" class="col-1 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="What is your Location?">Localització</label>
          <div class="col-3">
              <input type="" class="form-control" id="" readonly>
          </div>


          <div class="col-5 d-grid gap-2">
            <button type="button" class="btn btn-danger" style="background-color: #104069">Obrir Mapa</button>
          </div>

            <div class="form-check col-3">
                <input class="form-check-input" type="checkbox" v-model="cartaTrucada.fora_catalunya" id="flexCheckDefault">
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
                <select id="provincia" name="provincia" class="form-select" aria-label="Default select example" v-model="cartaTrucada_provincies_id">
                    <option v-for="provincia in provincies" :key="provincia.id" :value="provincia.id">{{ provincia.nom }}</option>
                </select>
            </div>


            <label for="" class="col-1 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="What region are you in?">Comarca</label>
            <div class="col-3 dropdown d-grid gap-2">
            <select class="form-select" aria-label="Default select example" >
                <option v-for="comarca in comarques" :key="comarca.id" value="">{{ comarca.nom }}</option>
            </select>
            </div>

            <label for="" class="col-1 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="What municipality are you in?">Municipi</label>
            <div class="col-3 dropdown d-grid gap-2">
            <select id="provincia" name="provincia" class="form-select" aria-label="Default select example" v-model="cartaTrucada_municipis_id" >
                <option v-for="municipi in municipis" :key="municipi.id" :value="municipi.id">{{ municipi.nom }}</option>
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
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="cartaTrucada.altres_ref_localitzacio" ></textarea>
          </div>
      </form>

      <div class="mt-3 justify-content-between">
        <div class="row">

            <label for="" class="col-2 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="What is your telephone number?">Telèfon</label>
            <div class="col-4">
            <input type="" class="form-control" id="" v-model="cartaTrucada.telefon" >
            </div>

            <label for="" class="col-2 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="What is your address?">Direcció</label>
            <div class="col-4">
            <input type="" class="form-control" id="" v-model="cartaTrucada.adreca_trucada" >
            </div>

        </div>
    </div>
      <div class="mt-3 justify-content-between">
          <div class="row">

              <label for="" class="col-2 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="What is your name?">Nom</label>
              <div class="col-4">
              <input type="" class="form-control" id="" v-model="cartaTrucada.nom_trucada" >
              </div>

          <div class="col-6 d-grid gap-2">
              <button type="button" class="btn btn-danger" style="background-color: #104069" @click="insertDadesPersonals()">Registrar/Antecedents</button>
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
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalExpedientsLabel">Afegir a un expedient</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
    <div class="row">
        <label for="" class="col-1 col-form-label">Cercar Per:</label>
        <div class="col-2 dropdown d-grid gap-2">
            <select class="form-select" aria-label="Default select example">
                <option></option>
                <option value="1">Codi</option>
                <option value="2">Data de Creació</option>
                <option value="3">Data de Modificació</option>
                <option value="4">Usuari Ultima Modificació</option>
                <option value="5">Estat</option>
            </select>
        </div>
    </div>
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
                            <td>{{expedient.estats_expedients_id}}</td>
                            <td>
                                <div class="d-grid gap-2 d-md-block">
                                    <button class="btn btn-success" type="button" @click="escollirExpedient(expedient.id)">Afegir</button>
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
                    antecedents: "",
                },
                //PARA RECOGER LA LISTA DE EXPEDIENTES
                expedientsLlista: [],
                tipusincidents: [],
                incidents: [],
                provincies: [],
                comarques: [],
                municipis: [],
                cartaTrucada_incidents_id: "",
                cartaTrucada_provincies_id: "",
                cartaTrucada_municipis_id: ""

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
                    .get('/incidents')
                    .then(response => {
                        me.incidents = response.data;
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
                    .get('/comarques')
                    .then(response => {
                        me.comarques = response.data;
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




        },
        methods:{
            currentTime(){
                const current = new Date();
                const time = {"Hora":current.getHours(),"Minutos":current.getMinutes(),"Segundos":current.getSeconds()}


                return time;

            },
            currentDay(){
                const current = new Date();
                const time = current.getFullYear() +"-"+ current.getMonth() +"-" + current.getDay() +" " +current.getHours() + ":" + current.getMinutes() + ":" +current.getSeconds()


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


                axios
                    .get('/incidents')
                    .then(response => {
                        me.incidents = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                    })
                    .finally(() => this.loading = false)
            },
            actualizarComarques(){

            },
            insertCartaTrucadaExpedientNou(){
                let me = this;

                me.crearExpedientNou();
                me.actualitzarHora();
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

                me.actualitzarHora();

                axios
                    .post('/cartestrucades', me.cartaTrucada)
                    .then(response => {
                        console.log(response);
                        history.go(-1);
                    })
                    .catch(error => {
                        console.log(error)
                    })
                    .finally(() => this.loading = false)

            },
            crearExpedientNou(){
                let me = this;
                axios

                    .post('/expedients', me.expedients)
                    .then(function(response) {
                        me.expedients = response.data;
                    })
                    .catch(function(error) {
                        console.log(error)
                    })
                    .finally(function() {
                        me.cartaTrucada.expedients_id = me.expedients.id;
                     })
                me.crearCartaTrucada();
            },
            crearCartaTrucada(){
                let me = this;
                axios
                    .post('/cartestrucades', me.cartaTrucada)
                    .then(response => {
                        console.log(response);
                        history.go(-1);
                    })
                    .catch(error => {
                        console.log(error)
                    })
                    .finally(() => this.loading = false)
            },
            insertDadesPersonals(){

                let me = this;
                //LOS DATOS HAN DE ESTAR RELLENADOS PARA QUE FUNCIONE BIEN!
                me.dadesPersonals.telefon = me.cartaTrucada.telefon;
                me.dadesPersonals.adreca = me.cartaTrucada.adreca_trucada;
                me.dadesPersonals.antecedents = "Cap Antecedent";

                axios
                    .post('/dadespersonals', me.dadesPersonals)
                    .then(function(response) {
                        me.dadesPersonals = response.data;
                    })
                    .catch(function(error) {
                        console.log(error)
                    })
                    .finally(function() {
                        me.cartaTrucada.dades_personals_id = me.dadesPersonals.id;
                     })



            },
            escollirExpedient(id){
                let me = this;
                me.cartaTrucada.expedients_id = id;
                me.afegirCartaTrucadaAExpedient();
            }

        },
        watch:{
            cartaTrucada_incidents_id: function(val)
                {
                    this.cartaTrucada.incidents_id = this.incidents.find(valor => valor.id == val);
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
                    this.incidents_id = val;
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
                }

        },
        mounted() {
            this.cartaTrucada.data_hora = this.currentTime();
            this.cartaTrucada.usuaris_id = this.usuari;
            console.log('Component mounted.')
        }
    }
</script>
