@extends('backend.admin_dash')

@section('login_content')
<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
      <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Login <span class="tx-info tx-normal">admin</span></div>

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group d-flex align-items-center justify-content-between">
          <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
          </div>
          @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
         @endif
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
        </div>
        <div class="d-flex mt-3">
          <button class="btn btn-facebook btn-primary me-2 col">
            <i class="fa fa-facebook"></i> Facebook </button>
          <button class="btn btn-google btn-danger ms-2 col">
            <i class="fa fa-google-plus"></i> Google plus </button>
        </div>
        <p class="sign-up">Don't have an Account?<a href="{{route('register')}}"> Sign Up</a></p>
      </form>


    </div><!-- login-wrapper -->
  </div><!-- d-flex -->

@endsection
