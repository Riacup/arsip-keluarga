@extends('base/script_page')

@section('content')

        <div class="main">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <img class="rounded float-left" src="{{('/tema/images/logoUGM.png')}}" width="100" >
                        <img class="rounded float-right" src="{{('/tema/images/logo.png')}}" width="100" > <br><br><br><br>
                    
                        <h2 class="form-title">ARSIP <br> KELUARGA</h2>
                        <p><b>{{ __('Reset Password') }}</b></p>

                        <div class="form-group row">
                            <label for="email" class="col-md-6 col-form-label text-md-left">{{ __('Email :') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                               &nbsp;&nbsp;&nbsp; <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
