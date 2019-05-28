<template>
  <div>
   <pie-chart :data="chartData"></pie-chart>
  </div>
</template>

<script>
import PieChart from "../libs/PieChart.js";
export default {
  name: "Pie",
  props: ['data', 'type'],
  components: {
    PieChart
  },
  data() {
    return {
      chartData: {
        labels: ["Yellow", "Red", "Blue"],
        datasets: [
          {
            label: "Data One",
            backgroundColor: ["#FFC91C", "#BFBFBF", "#D9D9D9"],
            data: [3, 7, 5]
          }
        ]
      }
    };
  },
  created () {
    if (this.data && this.data != 'null') {
      let vals = JSON.parse(this.data)
        if (this.type === 'capital stack') {
          let a = {
            labels: ["Common Equity", "Mezzanine Debt", "Preferred Equity", "Senior Debt"],
            datasets: [{
              label: "Capital Stack",
              backgroundColor: ["#FFC91C", "#AC9862", "#BFBFBF", "#D9D9D9"],
              data: [this.cleanData(vals['common-equity']), this.cleanData(vals['mezzanine-debt']), this.cleanData(vals['preferred-equity']), this.cleanData(vals['senior-debt'])]
            }]
          }
          this.chartData = a
        }
    }
  },
  methods: {
    cleanData(e){
      console.log(e)
      if (e == 'null' || !e) {
        return 0;
      } else if (e.indexOf('%') > -1) {
        return parseInt(e.replace(/\/%/g, ''))
      } else if (e.indexOf('percent') > -1) {
        return parseInt(e.replace(/\/percent/g, ''))
      } else {
        return 0;
      }
    }
  }
};
</script>
