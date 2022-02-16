Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

var myLineChart = document.getElementById("myLineChart");
var januari = document.getElementById('januari');
var februari = document.getElementById('februari');
var maret = document.getElementById('maret');
var april = document.getElementById('april');
var mei = document.getElementById('mei');
var juni = document.getElementById('juni');
var juli = document.getElementById('juli');
var agustus = document.getElementById('agustus');
var september = document.getElementById('september');
var oktober = document.getElementById('oktober');
var november = document.getElementById('november');
var desember = document.getElementById('desember');

var dataPelanggaran = {
  labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
  datasets: [{
    label: "Data Pelanggaran (per Bulan)",
    data: [januari.value, februari.value, maret.value, april.value, mei.value, juni.value, juli.value, agustus.value, september.value, oktober.value, november.value, desember.value],
    // hoverBackgroundColor: ['#17a673', '#2c9faf', '#3c9faf'],
    hoverBorderColor: "rgba(234, 236, 244, 1)",
  }]
};

var chartOptions = {
  tooltips: {
    backgroundColor: "rgb(180,180,180)",
    bodyFontColor: "#858796",
    borderColor: '#dddfeb',
  },

  legend: {
    display: true,
    position: 'top',
    labels: {
      boxWidth: 80,
      fontColor: 'black'
    }
  }
};

var lineChart = new Chart(myLineChart, {
  type: 'line',
  data: dataPelanggaran,
  options: chartOptions
});