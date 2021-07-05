@extends('layouts.dashboard')

@section('title', 'Loan requests')

@section('header', 'Loan Requests')

@section('page-title')
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h2 class="font-weight-semibold">Loan Requests</h2>
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
                <span class="breadcrumb-item active">Loan Requests</span>
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
                        <th>Fullname</th>
                        <th>Amount</th>
                        <th>Email</th>
                        <th>Eligibility level</th>
                        <th>Status</th>
                        <th>Date Requested</th>
                        <th data-orderable="false">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pendingLoans as $request)
                        <tr>
                            <td>{{ $request->user_id }}</td>
                            <td>{{ $request->amount }}</td>
                            <td>{{ $request->email }}</td>
                            <td>{{ $request->loan_eligible_id }}</td>
                            <td>{{$request->status}}</td>
                            <td>{{ $request->created_at->format('jS F, Y') }}</td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{ route('loan.show', $request->id) }}"
                                               class="dropdown-item">
                                                <i class="icon-eye"></i> View
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
