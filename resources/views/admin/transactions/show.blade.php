@extends('layouts.dashboard')

@section('header', ucwords($user->last_name).' - Customer')

@section('title', ucwords($user->first_name).' | Customer')

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
                    <i ></i> Customer
                </a>
                <span class="breadcrumb-item active"> {{$user->first_name }}</span>
            </div>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <div class="breadcrumb-elements-item dropdown p-0">
                    <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-gear mr-2"></i>
                        More Actions
                    </a>
                  
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="" class="dropdown-item"><i class="icon-user-lock"></i>FLag Customer</a>
                        <a href="" class="dropdown-item" ><i class="icon-eye"></i> View customer all transactions</a>
                        <a href="" class="dropdown-item"><i class="icon-accessibility"></i> Reset customer password</a>
                        <a href="" class="dropdown-item"><i class="icon-briefcase"></i> Promote customer loan eligibility</a>
                    </div>
                </div>
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
                <h6>Title:</h6>
                        <p>{{ $user->title}}</p>

                    <hr>

                    <h6>Years of employment:</h6>
                        <p>{{ $user->years_of_employment}}</p>

                        <hr>
                            <h6>Monthly_income:</h6>
                        <p>{{ $user->monthly_income}}</p>

                        <hr>
                    <h6>BVN verification:</h6>
                    <p>VERIFIED</p>

                    <hr>
                    <h6>Blacklist status</h6>
                    <p>NOT BLACKLISTED</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">

                <div class="card-body">
                        
                        <h6>Date of birth:</h6>
                        <p>{{ $user->date_of_birth}}</p>

                        <hr>
                        <h6>Marital status:</h6>
                        <p>{{ $user->marital_status}}</p>
                        <hr>
                            <h6>Address:</h6>
                        <p>{{ $user->address}}</p>
                        <hr>
                            <h6>Current employment:</h6>
                        <p>{{ $user->current_employment}}</p>
                        <hr>
                            <h6>Occupation:</h6>
                        <p>{{ $user->occupation}}</ p>

                        <hr>
                        <h6>Date Created:</h6>
                        <p>{{ $user->created_at->format('jS F, Y')}}</p>
                    
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
