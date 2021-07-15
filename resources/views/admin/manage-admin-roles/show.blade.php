@extends('layouts.dashboard')

@section('header', ucwords($user->name).' - Users')

@section('title', ucwords($user->name).' | Users')

@section('page-title')
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                 <h2 class="font-weight-semibold">{{ $user->name }}</h2>
            </div>
           
        </div>
    </div>
@stop

@section('breadcrumbs')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" class="breadcrumb-item">
                    <i class="icon-home2 mr-2"></i> Home
                </a>
                <a href="" class="breadcrumb-item">
                    <i ></i> User
                </a>
                <span class="breadcrumb-item active"> {{$user->name }}</span>
            </div>
        </div>

    
    </div>
@stop

@section('content')
    <div class="row">
        @if(session('error'))
            <span class="text-warning my-4">{{ session('error') }}</span>
        @endif
        <div class="col-md-6">
            <div class="card">

                <div class="card-body">
                    <h6>Name:</h6>
                    <p>{{ $user->name }}</p>

                    <hr>

                    <h6>Email:</h6>
                    <p>{{ $user->email }}</p>

                    <hr>
                    <h6>Role</h6>
                    <p></p>
                    <hr>
                        <h6>Date Created:</h6>
                        <p>{{ $user->created_at->format('jS F, Y')}}</p>
                </div>
                <div class="d-flex justify-content-start align-items-center">
                            <a href="" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn bg-blue ml-3">Change user role <i class="icon-paperplane ml-2"></i></button>
                        </div>
            </div>
        </div>
    </div>
@stop

@section('plugin-scripts')
    <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
@stop

@section('custom-scripts')
    <script>
        $('#business').addClass('active');
        $('.select2').select2({});
    </script>
@stop
