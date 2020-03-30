@extends('master')

@section('title', 'Manage Bill')

@section('body')
    <div class="row page-titles">
        <div class="col-md-3 align-self-center">
            <h3 class="text-primary">Purchase</h3>
        </div>
        <div class="col-md-5 text-center">
            <a href="{{ route('bill-info') }}" class="btn btn-link disabled">Manage Bills</a>
            <a href="{{ route('create-bill') }}" class="btn btn-link">Create A Bill</a>
        </div>
        <div class="col-md-4 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Purchase</a></li>
                <li class="breadcrumb-item active">Bill</li>
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
                                    <th>SL NO</th>
                                    <th>Vendor Name</th>
                                    <th>Bill Date</th>
                                    <th>Due Date</th>
                                    <th>Total Bill (BDT)</th>
                                    <th>Paid Amount (BDT)</th>
                                    <th class="no-sort no-export text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($bills as $bill)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $bill->vendor_name }}</td>
                                        <td>{{ $bill->bill_date }}</td>
                                        <td>{{ $bill->due_date }}</td>
                                        <td>{{ $bill->bill_total_price }}</td>
                                        <td>{{ $bill->paid_amount }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('edit-bill', ['id'=>$bill->id ]) }}" title="Edit" class="btn btn-info btn-rounded btn-xs p-l-10 p-r-8 p-t-3 p-b-1 m-l-2 m-r-2"><i class="fa fa-12 fa-edit"></i></a>
                                                @if($bill->payment_status == 'Pending')
                                                    <a href="javascript:void(0);" title="Payment" id="{{ $bill->id }}" class="btn btn-success btn-rounded btn-xs p-l-10 p-r-8 p-t-3 p-b-1 m-l-2 m-r-2 bill-payment"><i class="fa fa-12 fa-money"></i></a>
                                                @endif
                                                <a href="javascript:void(0);" title="PDF" class="btn btn-info btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2"><i class="fa fa-12 fa-file-pdf-o"></i></a>
                                                <a href="javascript:void(0);" title="Delete" class="btn btn-danger btn-rounded btn-xs p-l-10 p-r-8 p-t-3 p-b-1 m-l-2 m-r-2"><i class="fa fa-12 fa-trash-o"></i></a>
                                                @csrf
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

    <!-- bill Payment Modal -->
    <div class="modal" id="billPaymentModal" tabindex="-1" role="dialog" aria-labelledby="billPaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-70" role="document">
            <div class="modal-content">
                <div class="modal-header p-0 m-b-10">
                    <button type="button" class="close m-r-0 p-t-5 p-b-25" onclick="closeModal('#billPaymentModal')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-20">
                    <div class="basic-form">
                        <form action="{{ route('new-transaction') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Payment Date</span></label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" name="payment_date" value="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Payment Amount</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="payment_amount" id="billPaymentAmount" class="form-control"/>
                                    <input type="hidden" name="bill_id" id="billPaymentId"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Payment Type</span></label>
                                <div class="col-md-9">
                                    <select name="payment_type" id="incomeTransactionPaymentType" class="form-control">
                                        <option> --- Select Payment Method --- </option>
                                        <option value="Bank Payment">Bank Payment</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Check">Check</option>
                                        <option value="Credit Cart">Credit Cart</option>
                                        <option value="Paypal">Paypal</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Payment Account</span></label>
                                <div class="col-md-9">
                                    <select name="payment_account" id="incomeTransactionPaymentAccountCode" class="form-control">
                                        <option> --- Select Payment Account --- </option>
                                        @foreach($assetCashBankAccounts as $assetCashBankAccount)
                                            <option value="{{ $assetCashBankAccount->account_code }}">{{ $assetCashBankAccount->account_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Description/Notes</span></label>
                                <div class="col-md-9">
                                    <textarea name="payment_description" required class="form-control" rows="4" placeholder="Add a description..."></textarea>
                                </div>
                            </div>
                            <div class="form-group row m-0 p-0">
                                <label for="" class="col-md-3 col-form label"></label>
                                <div class="col-md-9 p-l-10 p-r-0">
                                    <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Save Payment Info">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
