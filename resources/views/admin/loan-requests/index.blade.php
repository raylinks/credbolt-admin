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
                        <th>Requested Amount</th>
                        <th>Email</th>
                        <th>Eligibility level</th>
                        <th>Status</th>
                        <th>Date Requested</th>
                        <th data-orderable="false">Actions</th>
                        <th data-orderable="false">others</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pendingLoans as $request)
                        <tr>
                            <td>{{ $request->user->last_name }}</td>
                            <td>{{ $request->amount }}</td>
                            <td>{{ $request->user->email }}</td>
                            <td>{{ $request->user->eligible_amount }}</td>
                            <td><span class="{{$request->status === 'successful' ? 'badge badge-success': 'badge badge-secondary' }}">{{$request->status}}</span></td>  
                            <td>{{ $request->created_at->format('jS F, Y') }}</td>
                            <td class="text">
                            <button type="submit" onclick="return confirm('Are you sure? you want  to  approve  this  loan??')"  class="btn btn-outline-primary view_details">
                                                        <span id="btn-text">Approve loan</span>
                                                        </button>
                                                        <button type="submit" onclick="return confirm('Are you sure? you want  to  decline  this  loan??')"  class="btn btn-outline-primary view_details">
                                                        <span id="btn-text">Decline loan</span>
                                                        </button>
                    
                            </td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <!-- <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{ route('loan.show', $request->id) }}"
                                               class="dropdown-item">
                                                <i class="icon-eye"></i> View
                                            </a>
                                        </div> -->
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
