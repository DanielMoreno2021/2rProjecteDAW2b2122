<template>
<div v-if="loaded" :chart-data="chartData">
  <Doughnut
    :chart-options="chartOptions"
    :chart-data="chartData"
    :chart-id="chartId"
    :dataset-id-key="datasetIdKey"
    :plugins="plugins"
    :css-classes="cssClasses"
    :styles="styles"
    :width="width"
    :height="height"
  />
</div>
</template>

<script>
import { Doughnut } from 'vue-chartjs/legacy'

import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  ArcElement,
  CategoryScale
} from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, ArcElement, CategoryScale)

export default {
  name: 'DoughnutChart',
  components: {
    Doughnut
  },
  props: {
    chartId: {
      type: String,
      default: 'doughnut-chart'
    },
    datasetIdKey: {
      type: String,
      default: 'label'
    },
    width: {
      type: Number,
      default: 400
    },
    height: {
      type: Number,
      default: 400
    },
    cssClasses: {
      default: '',
      type: String
    },
    styles: {
      type: Object,
      default: () => {}
    },
    plugins: {
      type: Array,
      default: () => []
    }
  },

 data() {
    return {
         chartData: {
        labels: [],
        datasets: [
          {
            backgroundColor: ['#41B883', '#E46651', '#00D8FF', '#DD1B16','#0058ff','#00ff27','#d8ff00','#ff2700','#ffa700','#0058ff'],
            data: [1,2,3,4,5,6,7,8,9]
          }
        ]
      },
      chartOptions: {
        responsive: true,
        maintainAspectRatio: false
      },
      loaded: false
    }
  },

mounted(){
        this.loaded = false;
        let me = this;


          axios
                .get('/tipusincidents')
                .then(response => {

                        response.data.forEach(element => {
                            me.chartData.labels.push(element.descripcio);
                            me.chartData.datasets.push(element.id.length);
                            //  this.chartData.datasets.data.push(element.incidents.length);
                        });
                        me.loaded = true;
                        // console.log(response.data)
                    })
                    .finally(( ) => this.loading=false)
                    // this.renderChart(this.chartData, this.options)

    }

 }

</script>
