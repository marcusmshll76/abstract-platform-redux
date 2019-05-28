<template>
  <div>
   <pie-chart :data="chartData"></pie-chart>
  </div>
</template>

<script>
import PieChart from "../libs/PieChart.js";
export default {
  name: "App",
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
  }
};
</script>
