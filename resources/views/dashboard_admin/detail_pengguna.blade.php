@extends('dashboard_admin/base')
@section('content')
 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Pengguna</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item"><a href="/pengguna">Data Pengguna</a></li>
              <li class="breadcrumb-item active">Detail Pengguna</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      @foreach($data as $d)
        <div class="row">
          <div class="col-md-6">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('storage/'.$d->foto)}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $d->user->name }}</h3>

                <p class="text-muted text-center">{{ $d->user->email }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nama Depan</b> <a class="float-right">{{ $d->nama_depan }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Nama Belakang</b> <a class="float-right">{{$d->nama_belakang}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>NIK</b> <a class="float-right">{{ $d->nik }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Jenis Kelamin</b> <a class="float-right">{{ $d->jenis_kelamin }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Tempat Kelahiran</b> <a class="float-right">{{ $d->tempat_lahir }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Tanggal Kelahiran</b> <a class="float-right">{{ $d->tanggal_lahir }}</a>
                  </li>                 
                  <li class="list-group-item">
                    <b>Recovery Data</b> <a class="float-right">{{ $d->recovery_data }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Domisili</b> <a class="float-right">{{ $d->domisili->provinsi }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{ $d->user->email }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Kode Keluarga</b> <a class="float-right">{{ $d->user->kode->kode }}</a>
                  </li>
                </ul>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <div class="col-md-6">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <h3 class="profile-username text-center">Summary Data</h3>
                <p class="text-muted text-center">Memori Pribadi</p>
                <ul class="list-group list-group-unbordered mb-2">
                  <li class="list-group-item">
                    <b>Jumlah Dokumen</b> <a class="float-right">{{ $dokumen }}</a>
                    <br>
                      <ul>
                      @foreach($katdokumen as $k)
                      <span>{{$k->name}} <a class="float-right">{{$k->dokumen->where('type', "pribadi")->count()}}</a></span>
                      <br>
                      @endforeach
                      </ul>
                  </li>
                  <li class="list-group-item">
                    <b>Jumlah Album</b> <a class="float-right">{{ $album }}</a>
                    <br>
                    <ul>
                    @foreach($katalbum as $k)
                      <span>{{$k->name}} <a class="float-right">{{$k->album->where('type', "pribadi")->count()}}</a></span>
                      <br>
                    @endforeach
                    </ul>
                  </li>
                  <li class="list-group-item">
                    <b>Jumlah Diari</b> <a class="float-right">{{ $diari }}</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

        </div>
        <!-- /.row -->
        @endforeach
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
@section('sweet')
@endsection