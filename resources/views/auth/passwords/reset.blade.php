@extends('base/script_page')
@section('content')

        <div class="main">
            <div class="card">


                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <img class="rounded float-left" src="{{('/tema/images/logoUGM.png')}}" width="100" >
                        <img class="rounded float-right" src="{{('/tema/images/logo.png')}}" width="100" > <br><br><br><br>
                    
                        <h2 class="form-title">ARSIP <br> KELUARGA</h2>
                        <p><b>{{ __('Reset Password') }}</b></p>

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-6 col-form-label text-md-left">{{ __('Email:') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-6 col-form-label text-md-left">{{ __('Password:') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-6 col-form-label text-md-left">{{ __('Confirm Password:') }}</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>

                    </form>
                </div>
            </div>
        </div>

@endsection
