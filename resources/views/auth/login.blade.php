@extends('base/script_page')
@section('content')

    <div class="main">
    <div class="card">
              <div class="card-body">
            <form method="POST" action="{{ route('login')}}">
                @csrf                
                <img class="rounded float-left" src="{{('/tema/images/logoUGM.png')}}" width="100" >
                <img class="rounded float-right" src="{{('/tema/images/logo.png')}}" width="100" > <br><br><br><br>
               
                <h2 class="form-title">ARSIP <br> KELUARGA</h2>
                <label for="email">Email</label>
                <!-- <div class="form-textbox"> -->
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                <!-- </div><br> -->

                <label for="pass">Password</label>
                <!-- <div class="form-textbox"> -->
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                <!-- </div> -->
                
                <a href="{{ route('password.request') }}" style="font-weight: inherit;color: #408ABD;"> Forgot Password?</a>
                <br><br>
                <div class="form-textbox">
                    <button type="submit" class="btn-masuk">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
@endsection