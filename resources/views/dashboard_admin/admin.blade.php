@extends('dashboard_admin/base')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <a href="{{route('pengguna.index')}}">
              <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
  
              <div class="info-box-content">
                  <span class="info-box-text text-dark">Personal</span>
                  <span class="info-box-number text-dark">{{ DB::table('users')->count()}}</span>
              </div>
              <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </a>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <a href="{{route('keluarga.index')}}">
              <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
  
              <div class="info-box-content">
                  <span class="info-box-text text-dark">Keluarga</span>
                  <span class="info-box-number text-dark">{{ DB::table('kode_keluarga')->count()}}</span>
              </div>
              <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </a>
          </div>
          <!-- /.col -->
  
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
  
          <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-id-badge"></i></span>
  
              <div class="info-box-content">
                  <span class="info-box-text">Memori Personal</span>            
                  <span class="info-box-number"> {{ $sum_personal }} </span>
                  
              </div>
              <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-photo-video"></i></span>
  
              <div class="info-box-content">
                  <span class="info-box-text">Memori Keluarga</span>
                
                  <span class="info-box-number">{{ $sum_keluarga }} </span>
                  </div>
              <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
          </div>
      <!-- /.col -->
      </div>
      <div class="row">
        <!-- /.col-md-6 -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Diagram Jumlah Pengguna</h3>
              </div><br>
              <div class="btn-group" data-toggle="btn-toggle">
                @php
                  $year = date('Y');
                @endphp
                <label for="exampleFormControlSelect1">Tahun:</label> &nbsp &nbsp 
                <select class="form-control" id="yearFilter">
                  <!-- <option value="" selected disabled>-- Tahun --</option> -->
                  @foreach ($years as $y)
                    <option value="{{$y->year}}" {{ $y->year == $year ? 'selected' : '' }}>{{$y->year}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="card-body">
              <div class="position-relative mb-4">
                <canvas id="pengguna" height="400"></canvas>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-md-6 -->

      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
@endsection
@push('js')
<script>
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
  
  $(document).on('change', '#yearFilter', function(e){
      e.preventDefault();

      var year = $('#yearFilter').val();
      
      var path = "{{ route('user_register') }}?year="+year;
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
</script>
@endpush