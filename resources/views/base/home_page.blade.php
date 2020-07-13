@include('base/header_page')
@extends('base/script_page')
@section('content')
    <!-- LANDING PAGE -->
    <div id="home" class="parallax first-section" style="background-image:url('tema/images/keluarga.jpg');">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="row mb-4">
                        <div class="col-md-7">
                            <h3>Gunakan Aplikasi AKAR</h3>
                            <h3>Arsip Keluarga :)</h3>
                            <p class="lead"></p>
                            <a data-scroll href="/registerPilih" class="btn btn-light btn-radius btn-brd" style="font-weight:bold"> DOWNLOAD SEKARANG! </a>
                        </div> 
                    </div>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
    @include('base/footer_page')   
    <a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
@endsection