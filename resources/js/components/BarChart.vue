<template>
  <div>
   <bar-chart class="bar" :data="chartData"></bar-chart>
  </div>
</template>

<script>
import BarChart from "../libs/BarChart.js";
export default {
  name: "Pie",
  props: ['data', 'type', 'cap'],
  components: {
    BarChart
  },
  data: () => ({
    chartData: {
      labels: ['Some text Data', 'Test Data', 'Some new data', 'Old data'],
      datasets: [
        {
						label: 'Distribution Overview',
						backgroundColor: '#f87979',
						pointBackgroundColor: 'white',
						borderWidth: 1,
						pointBorderColor: '#249EBF',
						data: [40, 20, 30, 50]
				}
			
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false
    }
  })
}
</script>
<style>
 .bar{
   max-width: 400px;
   height: auto;
 }
</style>

