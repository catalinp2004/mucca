@extends('admin.main')

@section('title', 'Forgot Password - Mucca Admin Tool')

@section('content')
    @include('auth._partials._login_logo')
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card login-card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body pad-top pad-bottom">
                    @if (session('status'))
                        <div class="row">
                            <div class="col-12 col-md-8 offset-md-2">
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-12 col-md-8 offset-md-2">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-12 col-md-8 offset-md-2 text-center">
                                <button type="submit" class="btn-mucca btn-mucca-success">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
