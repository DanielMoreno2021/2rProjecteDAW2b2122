<template>
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

                        <tr v-for="expedient in expedients" :key="expedient.id">

                            <td>{{expedient.id}}</td>
                            <td>{{expedient.data_creacio}}</td>
                            <td>{{expedient.data_ultima_modificacio}}</td>
                            <td>{{expedient.estats_expedients_id}}</td>
                            <td>
                                <div class="d-grid gap-2 d-md-block">
                                    <button class="btn btn-info" type="button">Veure</button>
                                    <button class="btn btn-success" type="button">Afegir</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                expedients: []

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
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
