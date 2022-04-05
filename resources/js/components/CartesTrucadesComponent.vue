<template>
    <div class="container">
        <div class="row">

        <label for="" class="col-2 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="What is your type of Emergency?">Tipus de Emergencia</label>
        <div class="col-4 dropdown d-grid gap-2">
            <select class="form-select" aria-label="Default select example" @change="actualitzarIncidents()">
                <option v-for="tipusincident in tipusincidents" :key="tipusincident.id" value="">{{ tipusincident.descripcio }}</option>
            </select>
        </div>

        <label for="" class="col-2 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="What is your Emergency? / What do you need?">Emergencia</label>
        <div class="col-4 dropdown d-grid gap-2">
            <select class="form-select" aria-label="Default select example">
                <option v-for="incident in incidents" :key="incident.id" value="">{{ incident.descripcio }}</option>
            </select>
        </div>
    </div>

      <form>
          <div class="form-group">
              <label for="exampleFormControlTextarea1">Nota Comuna</label>
              <textarea class="form-control textarea" id="exampleFormControlTextarea1" rows="1"></textarea>
          </div>
      </form>

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
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
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
                <select class="form-select" aria-label="Default select example" @change="actualitzarComarques()">
                    <option v-for="provincia in provincies" :key="provincia.id" value="">{{ provincia.nom }}</option>
                </select>
            </div>


            <label for="" class="col-1 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="What region are you in?">Comarca</label>
            <div class="col-3 dropdown d-grid gap-2">
            <select class="form-select" aria-label="Default select example" @change="actualitzarComarques()">
                <option v-for="comarca in comarques" :key="comarca.id" value="">{{ comarca.nom }}</option>
            </select>
            </div>

            <label for="" class="col-1 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="What municipality are you in?">Municipi</label>
            <div class="col-3 dropdown d-grid gap-2">
            <select class="form-select" aria-label="Default select example" @change="actualitzarComarques()">
                <option v-for="municipi in municipis" :key="municipi.id" value="">{{ municipi.nom }}</option>
            </select>
            </div>

          </div>
      </div>

      <div class="mt-3 justify-content-between">
        <div class="row">

            <label for="" class="col-2 col-form-label">Descripció</label>
            <div class="col-4">
            <input type="" class="form-control" id="">
            </div>

            <label for="" class="col-2 col-form-label">Detalls</label>
            <div class="col-4">
            <input type="" class="form-control" id="">
            </div>

        </div>
    </div>
      <form>
          <div class="form-group">
              <label for="exampleFormControlTextarea1">Altres Referencies</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
      </form>

      <div class="mt-3 justify-content-between">
        <div class="row">

            <label for="" class="col-2 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="What is your telephone number?">Telèfon</label>
            <div class="col-4">
            <input type="" class="form-control" id="">
            </div>

            <label for="" class="col-2 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="What is your address?">Direcció</label>
            <div class="col-4">
            <input type="" class="form-control" id="">
            </div>

        </div>
    </div>
      <div class="mt-3 justify-content-between">
          <div class="row">

              <label for="" class="col-2 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="What is your name?">Nom</label>
              <div class="col-4">
              <input type="" class="form-control" id="">
              </div>

          <div class="col-6 d-grid gap-2">
              <button type="button" class="btn btn-danger" style="background-color: #104069">Registrar/Antecedents</button>
          </div>
      </div>

      <div class="mt-3 justify-content-center">
          <div class="row">

          <div class="col-6 d-grid gap-2">
              <button type="button" class="btn btn-danger" style="background-color: #104069">Afegir a un expedient</button>
          </div>
          <div class="col-6 d-grid gap-2">
              <button type="button" class="btn btn-danger" style="background-color: #104069">Crear expedient nou</button>
          </div>
        </div>
      </div>
    </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                cartesTrucades: [],
                tipusincidents: [],
                incidents: [],
                provincies: [],
                comarques: [],
                municipis: []
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



        },
        methods:{
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
            }

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
