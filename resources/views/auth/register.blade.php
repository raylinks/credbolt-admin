@extends('layouts.auth')

@section('title', 'Login')

@section('content')

@if(session('errors'))
    @foreach (session('errors') as $error)
        <p>This is user {{ $error }}</p>
    @endforeach

   <span class="text-warning my-4">{{ session('errors') }}</span>

@endif



    <form class="login-form" method="POST" action="" style="width: 25rem !important;">
        @csrf
        <div class="card mb-0 shadow p-3">
            <div class="card-body">
                <div class="text-center mb-3">
                    <img src="{{ asset('global_assets/images/creditwolf.png') }}" style="width: 70%" class="my-3">
                    <span class="d-block text-muted mb-4">REGISTER AN ADMIN ACCOUNT</span>
                    @if(session('success'))
                        <span class="text-success my-4">{{ session('success') }}</span>
                    @endif

                    @if(session('error'))
                        <span class="text-danger my-4">{{ session('error') }}</span>
                    @endif
                </div>
                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                           placeholder="Full name" required>
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>

                    @if ($errors->has('name'))
                        <span class="text-danger form-text" role="alert">
                            <small>{{ $errors->first('name') }}</small>
                        </span>
                    @endif
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="text" class="form-control" name="username" value="{{ old('username') }}"
                           placeholder="username" required>
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>

                    @if ($errors->has('username'))
                        <span class="text-danger form-text" role="alert">
                            <small>{{ $errors->first('username') }}</small>
                        </span>
                    @endif
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}"
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

                <!-- <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="confirm_password" class="form-control" placeholder="Confirm password" name="confirm_password" required>
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                    @if ($errors->has('password'))
                        <span class="text-danger form-text" role="alert">
                            <small>{{ $errors->first('password') }}</small>
                        </span>
                    @endif
                </div> -->

                <div class="form-group ">
                            <label class="d-block">Select Role</label>
                            <select class="form-control " style="opacity:1 !important;" name="role" data-fouc>
                                @foreach ($roles as $role)
                                    <option value="{{$role->id}}">{{ucwords($role->name)}}</option>
                                @endforeach
                            </select>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                        Create <i class="icon-circle-right2 ml-2"></i>
                    </button>
                </div>


                <div class="text-center">
                    <a href="{{ route('auth.password.forgot') }}">Forgot password?</a>
                </div>
                <div class="text-center">
                    <a href="{{ route('auth.login') }}">Login</a>
                </div>
            </div>
        </div>
    </form>
    <!-- /login form -->
@endsection
