<template>
<main>
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
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>

                        <tr v-for="expedient in expedients" :key="expedient.id">

                            <td>{{expedient.id}}</td>
                            <td>{{expedient.data_creacio}}</td>
                            <td>{{expedient.data_ultima_modificacio}}</td>
                            <td>{{expedient.estats_expedients.estat}}</td>
                            <td>
                                <div class="d-grid gap-2 d-md-block">
                                    <button class="btn btn-info" type="button" @click="mostrarExpedient(expedient.id)">Veure</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>

<!-- Modal llista cartesTrucades
     -->

<div class="modal fade" id="modalCartesTrucades" tabindex="-1" aria-labelledby="modalCartesTrucadesLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCartesTrucadesLabel">Veure un expedient</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
        <div class="container" style="margin-top: 30px;">
            <div class="row">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Data/Hora</td>
                            <td>Temps trucada</td>
                            <td>Teléfon</td>
                            <td>Localització</td>
                            <td>Atengut per</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="cartatrucada in expedient.cartestrucades" :key="cartatrucada.id">
                            <!-- <td>hola</td>
                            <td>hola</td>
                            <td>hola</td>
                            <td>hola</td>
                            <td>hola</td> -->
                            <td>{{cartatrucada.data_hora}}</td>
                            <td>{{cartatrucada.temps_trucada}}</td>
                            <td>{{cartatrucada.telefon}}</td>
                            <td>{{cartatrucada.municipis.nom}}, {{cartatrucada.provincies.nom}}</td>
                            <td>{{cartatrucada.usuari.nom}} {{cartatrucada.usuari.cognoms}}</td>
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
        data() {
            return {
                expedients: [],
                expedient: {},
                valor_inicial: "1",

            }
        },
        created() {
            let me = this;
                axios
                    .get('/expedients')
                    .then(response => {
                        me.expedients = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                    })
                    .finally(() => this.loading = false)
        },
        methods:{
            mostrarExpedient(id){
                let me = this;

                axios
                    .get('/expedients/'+ id)
                    .then(response => {
                        me.expedient = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                    })
                    .finally(function(){

                        let modalObrirCartesTrucades = new bootstrap.Modal(document.getElementById('modalCartesTrucades'), {
                            keyboard: false
                        });
                        modalObrirCartesTrucades.toggle();
                    }

                    )


            }

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
