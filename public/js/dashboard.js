$(function() {
  'use strict'

  var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true
  
  $.ajax({
      type        : 'GET',
      url         : "{{ route('user_register') }}",
      dataType    : 'JSON',
      success     : function(data){
          window.salesChart = new Chart(document.getElementById('pengguna'), {
              type: 'bar',
              data: {
                  labels: ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUL', 'AGT', 'SEP', 'OKT', 'NOV', 'DES'],
                  datasets: [{
                      backgroundColor: ['#109CF1', '#FFB946', '#F7685B', '#2ED47A', '#885AF8', '#47C7EB', '#109CF1', '#FFB946', '#F7685B', '#2ED47A', '#885AF8', '#47C7EB'],
                      borderColor: '#007bff',
                      data: data.in
                  }, ]
              },
              options: {
                  maintainAspectRatio: false,
                  tooltips: {
                      mode: mode,
                      intersect: intersect
                  },
                  hover: {
                      mode: mode,
                      intersect: intersect
                  },
                  legend: {
                      display: false
                  },
                  scales: {
                      yAxes: [{
                          // display: false,
                          gridLines: {
                              display: true,
                              lineWidth: '4px',
                              color: 'rgba(0, 0, 0, .2)',
                              zeroLineColor: 'transparent'
                          },
                          ticks: {
                              beginAtZero:true,
                          }
                      }],
                      xAxes: [{
                          display: true,
                          gridLines: {
                              display: false
                          },
                          ticks: ticksStyle
                      }]
                  }
              }
          })
      }
  })
  
  $(document).on('click', '.btnFIlter', function(e){
      e.preventDefault();

      var year = $('#yearFilter').val();
      
      var path = "{{ route('admin.user_register') }}?year="+year;
      window.salesChart.destroy();
      $.ajax({
          type        : 'GET',
          url         : path,
          dataType    : 'JSON',
          success     : function(data){
              window.salesChart = new Chart(document.getElementById('pengguna'), {
                  type: 'bar',
                  data: {
                      labels: ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUL', 'AGT', 'SEP', 'OKT', 'NOV', 'DES'],
                      datasets: [{
                          backgroundColor: ['#109CF1', '#FFB946', '#F7685B', '#2ED47A', '#885AF8', '#47C7EB', '#109CF1', '#FFB946', '#F7685B', '#2ED47A', '#885AF8', '#47C7EB'],
                          borderColor: '#007bff',
                          data: data.in
                      }, ]
                  },
                  options: {
                      maintainAspectRatio: false,
                      tooltips: {
                          mode: mode,
                          intersect: intersect
                      },
                      hover: {
                          mode: mode,
                          intersect: intersect
                      },
                      legend: {
                          display: false
                      },
                      scales: {
                          yAxes: [{
                              // display: false,
                              gridLines: {
                                  display: true,
                                  lineWidth: '4px',
                                  color: 'rgba(0, 0, 0, .2)',
                                  zeroLineColor: 'transparent'
                              },
                              ticks: {
                                  beginAtZero:true,
                              }
                          }],
                          xAxes: [{
                              display: true,
                              gridLines: {
                                  display: false
                              },
                              ticks: ticksStyle
                          }]
                      }
                  }
              })
          }
      })


  })
});