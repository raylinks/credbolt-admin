@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <form class="login-form" method="POST" action="{{ route('auth.login') }}" style="width: 25rem !important;">
        @csrf
        <div class="card mb-0 shadow p-3">
            <div class="card-body">
                <div class="text-center mb-3">
                    <img src="{{ asset('global_assets/images/patricia.png') }}" style="width: 70%" class="my-3">
                    <span class="d-block text-muted mb-4">LOGIN INTO YOUR ACCOUNT</span>
                    @if(session('success'))
                        <span class="text-success my-4">{{ session('success') }}</span>
                    @endif

                    @if(session('error'))
                        <span class="text-danger my-4">{{ session('error') }}</span>
                    @endif
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="email" class="form-control" name="user_identifier" value="{{ old('user_identifier') }}"
                           placeholder="Email Address" required>
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>

                    @if ($errors->has('user_identifier'))
                        <span class="text-danger form-text" role="alert">
                            <small>{{ $errors->first('user_identifier') }}</small>
                        </span>
                    @endif
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                    @if ($errors->has('password'))
                        <span class="text-danger form-text" role="alert">
                            <small>{{ $errors->first('password') }}</small>
                        </span>
                    @endif
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                        Login <i class="icon-circle-right2 ml-2"></i>
                    </button>
                </div>


                <div class="text-center">
                    <a href="{{ route('auth.password.forgot') }}">Forgot password?</a>
                </div>
            </div>
        </div>
    </form>
    <!-- /login form -->
@endsection
