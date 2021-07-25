@extends('layouts.dashboard')

@section('title', 'Registered customers')

@section('header', 'Registered customers')

@section('page-title')
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h2 class="font-weight-semibold">Active users </h2>
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
                <span class="breadcrumb-item active">All customers</span>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <table class="table datatable-basic table-hover">
                    <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>lastname</th>
                        <th>Email</th>
                        <th>Eligibility amount</th>
                        <th>Registration status</th>
                        <th>Date Registered</th>
                        <th data-orderable="false">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $request)
                        <tr>
                            <td>{{ $request->first_name }}</td>
                            <td>{{ $request->last_name }}</td>
                            <td>{{ $request->email }}</td>
                            <td>{{ $request->eligible_amount }}</td>
                            <td>{{$request->registration_completed == '1' ? 'Verified' :  'Not-verified'}}</td>
                            <td>{{ $request->created_at->format('jS F, Y') }}</td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{ route('user.show', $request->id) }}"
                                               class="dropdown-item">
                                                <i class="icon-eye"></i> View more details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('custom-scripts')
    <script>
        $('#earlyAccess').addClass('active')
        $('.datatable-basic').DataTable();
    </script>
@stop
