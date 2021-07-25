@extends('layouts.dashboard')

@section('title', 'Transactions')

@section('header', 'Transactions')

@section('page-title')
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h2 class="font-weight-semibold">All Transactions</h2>
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
                <span class="breadcrumb-item active">Transactions</span>
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
                        <th>Customer email</th>
                        <th>Reference</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Date Requested</th>
                        <th data-orderable="false">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->user->email }}</td>
                            <td>{{ $transaction->reference }}</td>
                            <td>{{ $transaction->type }}</td>
                            <td><span class="{{$transaction->status === 'successful' ? 'badge badge-success': 'badge badge-secondary' }}">{{$transaction->status}}</span></td>  
                            <td>{{ $transaction->created_at->format('jS F, Y') }}</td>
                    
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <!-- <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{ route('transaction.show', $transaction->id) }}"
                                               class="dropdown-item">
                                                <i class="icon-eye"></i> View transaction details
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
