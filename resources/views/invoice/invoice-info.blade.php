@extends('master')

@section('title', 'Manage Invoice')

@section('body')
    <div class="row page-titles">
        <div class="col-md-3 align-self-center">
            <h3 class="text-primary">Sales</h3>
        </div>
        <div class="col-md-5 text-center">
            <a href="{{ route('invoice-info') }}" class="btn btn-link disabled">Manage Invoice</a>
            <a href="{{ route('create-invoice') }}" class="btn btn-link">Create An Invoice</a>
        </div>
        <div class="col-md-4 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Sales</a></li>
                <li class="breadcrumb-item active">Invoice</li>
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
                                    <th>Invoice Number</th>
                                    <th>P.O./S.O. Number</th>
                                    <th>Customer Name</th>
                                    <th>Total Amount (BDT)</th>
                                    <th>Paid Amount (BDT)</th>
                                    <th class="no-sort no-export text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $invoice->invoice_number }}</td>
                                    <td>{{ $invoice->purchase_order_number }}</td>
                                    <td>{{ $invoice->first_name.' '.$invoice->last_name }}</td>
                                    <td>{{ $invoice->invoice_total_price }}</td>
                                    <td>{{ $invoice->paid_amount }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a title="Edit" class="btn btn-info btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2" href="{{ route('edit-invoice', ['id'=>$invoice->id ]) }}"><i class="fa fa-12 fa-edit"></i></a>
                                            @if($invoice->payment_status == 'Pending')
                                                <a href="javascript:void(0);" title="Payment" id="{{ $invoice->id }}" class="btn btn-success btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2 invoice-payment"><i class="fa fa-12 fa-money"></i></a>
                                            @endif
                                            <a href="javascript:void(0);" title="PDF" class="btn btn-info btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2"><i class="fa fa-12 fa-file-pdf-o"></i></a>
                                            <a href="javascript:void(0);" title="Delete" id="{{ $invoice->id }}" class="btn btn-danger btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2 delete-invoice"><i class="fa fa-12 fa-trash-o"></i></a>
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

    <!-- invoice Payment Modal -->
    <div class="modal" id="invoicePaymentModal" tabindex="-1" role="dialog" aria-labelledby="invoicePaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-70" role="document">
            <div class="modal-content">
                <div class="modal-header p-0 m-b-10">
                    <button type="button" class="close m-r-0 p-t-5 p-b-25" onclick="closeModal('#invoicePaymentModal')">
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
                                    <input type="text" name="payment_amount" id="invoicePaymentAmount" class="form-control"/>
                                    <input type="hidden" name="invoice_id" id="invoicePaymentId"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Payment Type</span></label>
                                <div class="col-md-9">
                                    <select name="payment_type" class="form-control">
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
                                    <select name="payment_account" class="form-control">
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
                                    <textarea name="payment_description" required class="form-control" rows="4"></textarea>
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
