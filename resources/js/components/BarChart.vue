<template>
  <div>
   <bar-chart class="bar" :width="500" :height="500" :options="options" :data="chartData"></bar-chart>
  </div>
</template>

<script>
import BarChart from "../libs/BarChart.js";
export default {
  name: "Pie",
  props: ['data', 'type'],
  components: {
    BarChart
  },
  data: () => ({
    chartData: {},
    options: {
      responsive: false,
      maintainAspectRatio: false,
      scales: {
        yAxes: [{
            ticks: {
              min: 15000,
              max: 25000,
              stepSize: 1000,
                // Include a dollar sign in the ticks
                callback: function(value, index, values) {
                    return '$' + value.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,').split('.')[0];
                }
            }
        }]
      }
    },
  }),
  created () {
    if (this.type === 'distribution') {
      if (this.data && this.data != 'null') {
        let d = JSON.parse(this.data)
        let i = d && d != 'null' ? JSON.parse(d.investment) : 'null'
        let o = d && d != 'null' ? JSON.parse(d.distributions) : 'null'

        let labels = []
        let vs = []
        let colors = []

        var self = this
        o.map(function (x) {
          labels.push(x.name)
          let percent = ((i.share) * 100).toFixed(2);
          let t = x.totalAmount.replace(/,/g, '').replace('$', '')
          x.distribution = parseInt(t)
          vs.push(self.cleanData(((percent / 100) * t).toFixed(2)))
          colors.push(self.dynamicColors())
        });

        let a = {
          labels: labels,
          datasets: [{
            label: "Distribution Overview",
            backgroundColor: colors,
            data: vs
          }]
        }
        this.chartData = a
      }
    }
    if (this.type === 'manual') {
        let a = {
          labels: ['December','January','February','March','April','May'],
          datasets: [{
            label: ['Distribution Amount'],
            backgroundColor: ['#4d73be', '#4d73be', '#4d73be', '#4d73be', '#4d73be', '#4d73be'],
            data: [22000, 21800, 21200, 22900, 21930, 23000]
          }]
        }
        this.chartData = a
    }
    //4d73be
  },
  methods: {
    dynamicColors () {
       let r = Math.floor(Math.random() * 255);
       let g = Math.floor(Math.random() * 255);
       let b = Math.floor(Math.random() * 255);
       return "rgb(" + r + "," + g + "," + b + ")";
    },
    cleanData(e){
      if (e == 'null' || !e) {
        return 0;
      } else if (isNaN(e) === false) {
        return (e * 100).toFixed(2)
      } else if (e.indexOf('%') > -1) {
        return parseInt(e.replace(/\/%/g, ''))
      } else if (e.indexOf('percent') > -1) {
        return parseInt(e.replace(/\/percent/g, ''))
      } else if (typeof e === 'string') {
        return 1;
      } else {
        return 1;
      }
    }
  }
}
</script>
<style>
 .bar{
   max-width: 400px;
   height: auto;
 }
</style>

