@extends('layouts.auth')

@section('title', 'Forgot password')

@section('content')
    <form class="login-form" method="POST" action="{{ route('auth.password.forgot') }}"
          style="width: 25rem !important;">
        @csrf
        <div class="card mb-0 shadow p-3">
            <div class="card-body">
                <div class="text-center mb-3">
                    <img src="{{ asset('global_assets/images/creditwolf.png') }}" style="width: 70%" class="my-3">
                    <span class="mb-4 d-block text-muted">FORGOT PASSWORD</span>
                    @if(session('error'))
                        <span class="text-danger my-4">{{ session('error') }}</span>
                    @endif

                    @if(session('success'))
                        <span class="text-success my-4">{{ session('success') }}</span>
                    @endif
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                           placeholder="Email Address" required>
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>

                    @if ($errors->has('email'))
                        <span class="text-danger form-text" role="alert">
                            <small>{{ $errors->first('email') }}</small>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                        Request to reset password <i class="icon-circle-right2 ml-2"></i>
                    </button>
                </div>

                <div class="text-center">
                    <a href="{{ route('auth.login') }}">Login your account</a>
                </div>
            </div>
        </div>
    </form>
    <!-- /login form -->
@endsection
