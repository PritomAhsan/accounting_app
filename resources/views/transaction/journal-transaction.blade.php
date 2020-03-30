@extends('master')

@section('title', 'Manage Journal Transaction')

@section('body')
    <div class="row page-titles">
        <div class="col-md-3 align-self-center">
            <h3 class="text-primary">Accounts</h3>
        </div>
        <div class="col-md-5 text-center">
            <a href="{{ route('journal-transaction') }}" class="btn btn-link disabled">Manage Journal Transaction</a>
            <a href="{{ route('add-journal-transaction') }}" class="btn btn-link">Add Journal Transaction</a>
        </div>
        <div class="col-md-4 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Accounts</a></li>
                <li class="breadcrumb-item active">Journal Transaction</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table exportable table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Date</th>
                                    <th class="no-sort">Description</th>
                                    <th>Debit Amount</th>
                                    <th>Credit Type</th>
                                    <th class="no-sort no-export text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($manualTransactions as $manualTransaction)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $manualTransaction->date }}</td>
                                        <td>{{ $manualTransaction->description }}</td>
                                        <td>{{ $manualTransaction->debit }}</td>
                                        <td>{{ $manualTransaction->credit }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('edit-manual-journal', ['id'=>$manualTransaction->id]) }}" title="Edit" class="btn btn-info btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2"><i class="fa fa-12 fa-edit"></i></a>
                                                <a href="javascript:void(0)" title="Delete" class="btn btn-danger btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2"><i class="fa fa-12 fa-trash-o"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- /# column -->
        </div>
        <!-- /# row -->
@endsection
