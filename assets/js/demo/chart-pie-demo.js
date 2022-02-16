// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx2 = document.getElementById("myPieChart2");
var kota = document.getElementById('kota');
var provinsi = document.getElementById('provinsi');
var nasional = document.getElementById('nasional');
var internasional = document.getElementById('internasional');

var myPieChart2 = new Chart(ctx2, {
  type: 'doughnut',
  data: {
    labels: ["Kota", "Provinsi", "Nasional", "Internasional"],
    datasets: [{
      data: [kota.value, provinsi.value, nasional.value, internasional.value],
      backgroundColor: ['#f0ad4e', '#5bc0de', '#0275d8', '#5cb85c'],
      hoverBackgroundColor: ['#f0ad4e', '#5bc0de', '#0275d8', '#5cb85c'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
