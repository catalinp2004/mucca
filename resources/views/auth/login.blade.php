@extends('admin.main')

@section('title', 'Login - Mucca Admin Tool')

@section('content')
    @include('auth._partials._login_logo')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card login-card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body pad-top pad-bottom">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-12 col-md-8 offset-md-2">
                                <label for="email">{{ __('E-Mail Address') }}:</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
    
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-md-8 offset-md-2">
                                <label for="password">{{ __('Password') }}:</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-md-8 offset-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-md-8 offset-md-2 text-center">
                                <button type="submit" class="btn-mucca btn-mucca-success">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-12 col-md-8 offset-md-2 text-center">
                                @if (Route::has('password.request'))
                                    <a class="fs-12 text-gold" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
