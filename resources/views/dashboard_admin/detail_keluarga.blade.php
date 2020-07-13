@extends('dashboard_admin/base')
@section('content')
 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Keluarga</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item"><a href="/keluarga">Data Keluarga</a></li>
              <li class="breadcrumb-item active">Detail Keluarga</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            
            <!-- Profile Image -->

            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
              <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                      <div class="card-body">
                        <h3 class="profile-username text-center">Summary Data</h3>
                        <p class="text-muted text-center">Memori Keluarga</p>
                        <ul class="list-group list-group-unbordered mb-2">
                          <li class="list-group-item">
                            <b>Jumlah Dokumen</b> <a class="float-right">{{ $dokumen }}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Jumlah Album</b> <a class="float-right">{{ $album }}</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                </div>
              </div>
              <div class="row">
                @foreach($data as $d)
                <div class="col-3">
                    <div class="card" style="width:230px">
                      <div class="card-body text-center">
                        <h3 class="profile-username text-center">{{ $d->name }}</h3>
                        <p class="text-muted text-center">{{ $d->email }}</p>
                        <a href="{{route('pengguna.show', $d->id)}}" class="btn btn-primary">Lihat Profile</a>
                      </div>
                    </div>
                </div>
                @endforeach
              </div>
                
              </div>
            </div>
            <!-- /.card -->

          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
@section('sweet')
@endsection