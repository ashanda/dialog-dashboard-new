@extends('layouts.auth')

@section('login_form')
<div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">

            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <h1 class="text-muted">Welcome!</h1>
                <small>Sign in with credentials</small>
              </div>
              <form method="POST" action="{{ route('login') }}">
                        @csrf
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                     <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                            <span class="text-muted">{{ __('Remember Me') }}</span>
                    </label>
                 
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary my-4">
                                    {{ __('Login') }}
                    </button>
                 
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            @if (Route::has('password.request'))
            <div class="col-6">
                                    <a class="text-light" href="{{ route('password.request') }}">
                                        <small>{{ __('Forgot Your Password?') }}</small>
            </div>                    </a>
           @endif
            
            
          </div>
        </div>
      </div>
    </div>


@endsection
