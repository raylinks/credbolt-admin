@extends('layouts.auth')

@section('title', 'Reset password')

@section('content')
    <form class="login-form" method="POST" action="{{ route('auth.password.reset') }}"
          style="width: 25rem !important;">
        @csrf
        <div class="card mb-0 shadow p-3">
            <div class="card-body">
                <div class="text-center mb-3">
                    <img src="{{{ asset('global_assets/images/creditwolf.png') }}" style="width: 70%" class="my-3">
                    <span class="mb-4 d-block text-muted">RESET PASSWORD</span>
                    @if(session('error'))
                        <span class="text-danger my-4">{{ session('error') }}</span>
                    @endif

                    @if(session('success'))
                        <span class="text-success my-4">{{ session('success') }}</span>
                    @endif
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="password" class="form-control" name="password"
                           placeholder="Password" required>
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>

                    @if ($errors->has('password'))
                        <span class="text-danger form-text" role="alert">
                            <small>{{ $errors->first('password') }}</small>
                        </span>
                    @endif
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="password" class="form-control" name="password_confirmation"
                           placeholder="Password confirmation" required>
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                </div>

                <div class="form-group">
                    <input type="hidden" name="token" value="{{$reset->token}}">
                    <input type="hidden" name="email" value="{{$reset->email}}">

                    <button type="submit" class="btn btn-primary btn-block">
                        Reset Password <i class="icon-circle-right2 ml-2"></i>
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
