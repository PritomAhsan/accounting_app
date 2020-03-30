@extends('master')

@section('title', 'Create An Invoice')

@section('body')
    <div class="row page-titles">
        <div class="col-md-3 align-self-center">
            <h3 class="text-primary">Sales</h3>
        </div>
        <div class="col-md-5 text-center">
            <a href="{{ route('invoice-info') }}" class="btn btn-link">Manage Invoice</a>
            <a href="{{ route('create-invoice') }}" class="btn btn-link disabled">Create An Invoice</a>
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
        <form action="{{ route('new-invoice') }}" method="POST" id="createInvoiceForm" name="create_invoice_form">
            @csrf
            <div class="row justify-content-end">
                <div class="col-lg-2 m-t-15">
                    <input type="submit" value="Save & Continue" class="btn btn-flat btn-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-0">
                        <div class="card-header bg-primary">
                            <h5 class="card-title text-dark">New Invoice</h5>
                        </div>
                        <div class="card-body p-20">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="customerDetails" class="p-b-15">
                                        <h3> Billing Info </h3>
                                        <span><strong id="invoiceCustomerName" readonly></strong></span><br/>
                                        <input type="hidden" id="customerId" name="customer_id"/>
                                        <span id="invoiceCustomerPhoneNumber"></span><br/>
                                        <span id="invoiceCustomerEmailAddress"></span><br/>
                                        <span id="invoiceCustomerAddress"></span><br/>
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);" id="changeCustomer" class="btn btn-flat btn-primary m-b-15">Change Customer</a>
                                    </div>
                                    <div id="invoiceCustomer">
                                        <select class="form-control m-b-15" onchange="selectCustomerInfo(this.value)">
                                            <option> --- Add A Customer --- </option>
                                            @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->first_name.' '.$customer->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table pull-right m-b-15">
                                            <tr>
                                                <td>Invoice Number : &nbsp;</td>
                                                <td><input type="text" readonly id="invoiceNumber" value="{{ $invoiceNumber }}" name="invoice_number" class="form-control"/></td>
                                            </tr>
                                            <tr>
                                                <td>P.O./S.O. Number : &nbsp;</td>
                                                <td><input type="number" id="purchaseOrderNumber" name="purchase_order_number" class="form-control"/></td>
                                            </tr>
                                            <tr>
                                                <td>Invoice Date : &nbsp;</td>
                                                <td><input type="date" required id="invoiceDate" value="{{ date('Y-m-d') }}" name="invoice_date" class="form-control"/></td>
                                            </tr>
                                            <tr>
                                                <td>Due Date : &nbsp;</td>
                                                <td><input type="date" required id="dueDate" value="{{ date('Y-m-d') }}" name="due_date" class="form-control"/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped m-b-15" id="productTable">
                                            <thead class="bg-primary">
                                            <tr>
                                                <th class="text-dark">Item Name</th>
                                                <th class="text-dark">Item Description</th>
                                                <th class="text-dark">Item Quantity</th>
                                                <th class="text-dark">Unit Price (TK.)</th>
                                                <th class="text-dark">Total Price (TK.)</th>
                                                <th class="text-dark text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table table-bordered m-b-15">
                                            <tr>
                                                <th>Total Price (BDT) </th>
                                                <td><input type="text" id="invoiceTotalPrice" name="invoice_total_price" class="form-control" value="0" readonly/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <select id="invoiceProductSelect" class="form-control" onchange="selectProductInfo(this.value)">
                                        <option value="demo"> --- Add A Product --- </option>
                                        @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- /# column -->
    </div>
    <!-- /# row -->
@endsection
