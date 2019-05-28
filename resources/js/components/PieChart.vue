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
        labels: ["Not Enough Data"],
        datasets: [
          {
            label: "Data One",
            backgroundColor: ["#D9D9D9"],
            data: [100]
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
        else if (this.type === 'cap table') {
          let a = {
            labels: [vals.fn + ' ' + vals.ln, vals.fn1 + ' ' + vals.ln1, vals.fn2 + ' ' + vals.ln2],
            datasets: [{
              label: "Cap Table",
              backgroundColor: ["#FFC91C", "#AC9862", "#BFBFBF", "#D9D9D9"],
              data: [this.cleanData(vals.ow), this.cleanData(vals.ow1), this.cleanData(vals.ow2)]
            }]
          }
          this.chartData = a
        }
    }
  },
  methods: {
    cleanData(e){
      if (e == 'null' || !e) {
        return 0;
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
};
</script>
