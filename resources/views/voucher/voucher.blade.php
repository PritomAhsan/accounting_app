@extends('master')

@section('title', 'All Vouchers')

@section('body')
    <div class="row page-titles">
        <div class="col-md-3 align-self-center">
            <h3 class="text-primary">Accounts</h3>
        </div>
        <div class="col-md-4 align-self-center offset-md-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Accounts</a></li>
                <li class="breadcrumb-item active">Voucher</li>
                <li class="breadcrumb-item active">All Voucher</li>
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
                                @if($message = Session::get('message'))
                                    <h5 class="text-center text-success">{{ $message }}</h5>
                                @endif
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Voucher ID</th>
                                    <th>Voucher Type</th>
                                    <th class="no-sort">Description</th>
                                    <th>Total Amount</th>
                                    <th>Voucher Date</th>
                                    <th class="no-sort no-export text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($vouchers as $voucher)
                                    @if($voucher->voucher_type == 'Payment Voucher' || $voucher->voucher_type == 'Credit Voucher' || $voucher->voucher_type == 'Journal Voucher')
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $voucher->id }}</td>
                                        <td>{{ $voucher->voucher_type }}</td>
                                        <td>{{ $voucher->description }}</td>
                                        <td>{{ $voucher->total_amount }}</td>
                                        <td>{{ $voucher->voucher_date }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="javascript:void(0)" title="View" id="{{ $voucher->id }}" class="btn btn-primary btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2 view-voucher-detail"><i class="fa fa-12 fa-eye"></i></a>
                                                <a href="{{ route('edit-voucher', ['id'=>$voucher->id]) }}" title="Edit" class="btn btn-info btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2"><i class="fa fa-12 fa-edit"></i></a>
                                                <a href="{{ route('print-voucher', ['id'=>$voucher->id]) }}" title="Edit" class="btn btn-success btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2"><i class="fa fa-12 fa-print"></i></a>
                                                <a href="javascript:void(0)" title="Delete" class="btn btn-danger btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2"><i class="fa fa-12 fa-trash-o"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
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

    <!-- View Voucher Details Modal -->
    <div class="modal" id="viewVoucherDetailModal" tabindex="-1" role="dialog" aria-labelledby="viewVoucherDetailModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-90" role="document">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <button type="button" class="close m-r-0 p-t-5 p-b-25"
                            onclick="closeModal('#viewVoucherDetailModal')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-15">
                    <h3 class="text-center">Voucher No: <span id="voucherNoRes"></span> Detail Info</h3>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>Account Code</th>
                                <th>Description</th>
                                <th>Credit</th>
                                <th>Debit</th>
                            </tr>
                            </thead>
                            <tbody id="voucherResult"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
