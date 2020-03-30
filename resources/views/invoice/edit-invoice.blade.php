@extends('master')

@section('title', 'Edit Invoice')

@section('body')
    <div class="row page-titles">
        <div class="col-md-3 align-self-center">
            <h3 class="text-primary">Sales</h3>
        </div>
        <div class="col-md-5 text-center">
            <a href="{{ route('invoice-info') }}" class="btn btn-link">Manage Invoice</a>
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
        <form action="{{ route('update-invoice') }}" method="POST">
            @csrf
            <div class="row justify-content-end">
                <div class="col-lg-2 m-t-15">
                    <input type="submit" value="Update & Continue" class="btn btn-flat btn-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-0">
                        <div class="card-header bg-primary">
                            <h5 class="card-title text-dark">Edit Invoice</h5>
                        </div>
                        <div class="card-body p-15">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="editCustomerDetails" class="p-b-15">
                                        <h3> Customer Info </h3>
                                        <span><strong id="invoiceCustomerName">{{ $customer->first_name.' '. $customer->last_name }}</strong></span><br/>
                                        <input type="hidden" id="invoiceCustomerId" value="{{ $customer->id }}"
                                               name="customer_id"/>
                                        <span id="invoiceCustomerPhoneNumber">{{ $customer->phone_number }}</span><br/>
                                        <span id="invoiceCustomerEmailAddress">{{ $customer->email_address }}</span><br/>
                                        <span id="invoiceCustomerAddress">{{ $customer->address}}</span><br/>
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);" id="editChangeCustomer"
                                           class="btn btn-flat btn-primary m-b-15">Change Customer</a>
                                    </div>
                                    <div id="editInvoiceCustomer">
                                        <select class="form-control m-b-15"
                                                onchange="selectEditCustomerInfo(this.value)">
                                            <option> --- Add A Customer ---</option>
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
                                                <td>
                                                    <input type="text" readonly id="invoiceNumber"
                                                           value="{{ $invoice->invoice_number }}" name="invoice_number"
                                                           class="form-control"/>
                                                    <input type="hidden" id="invoiceId" value="{{ $invoice->id }}"
                                                           name="invoice_id"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>P.O./S.O. Number : &nbsp;</td>
                                                <td><input type="number" id="purchaseOrderNumber"
                                                           value="{{ $invoice->purchase_order_number }}"
                                                           name="purchase_order_number" class="form-control"/></td>
                                            </tr>
                                            <tr>
                                                <td>Invoice Date : &nbsp;</td>
                                                <td><input type="date" required id="invoiceDate"
                                                           value="{{ $invoice->invoice_date }}" name="invoice_date"
                                                           class="form-control"/></td>
                                            </tr>
                                            <tr>
                                                <td>Due Date : &nbsp;</td>
                                                <td><input type="date" required id="dueDate"
                                                           value="{{ $invoice->due_date }}" name="due_date"
                                                           class="form-control"/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped m-b-15" id="invoiceProductTable">
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
                                            <tbody>
                                            @php($index = 0)
                                            @foreach($invoiceDetails as $invoiceDetail)
                                                <tr>
                                                    <td>
                                                        <input type="text" value="{{ $invoiceDetail->item_name }}"
                                                               name="invoice_item[{{ $index }}][item_name]" readonly
                                                               class="form-control"/>
                                                        <input type="hidden" value="{{ $invoiceDetail->item_id }}"
                                                               name="invoice_item[{{ $index }}][item_id]"/>
                                                        <input type="hidden" value="{{ $invoiceDetail->id }}"
                                                               name="invoice_item[{{ $index }}][invoice_detail_id]"/>
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                               name="invoice_item[{{ $index }}][item_description]"
                                                               value="{{ $invoiceDetail->item_description }}"
                                                               class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="number" id='qty{{ $index }}'
                                                               value="{{ $invoiceDetail->item_quantity }}"
                                                               onkeyup="updateEditInvoiceProductTotalPrice({{ $index }})"
                                                               name="invoice_item[{{ $index }}][item_quantity]"
                                                               class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" id='price{{ $index }}'
                                                               value="{{ $invoiceDetail->item_price }}"
                                                               onkeyup="updateEditInvoiceProductTotalPrice({{ $index }})"
                                                               name="invoice_item[{{ $index }}][item_price]"
                                                               class="form-control">
                                                    </td>
                                                    <td class="invoice-total-price" id="{{ 'res'.$index }}">
                                                        {{ $invoiceDetail->item_price*$invoiceDetail->item_quantity }}
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-between">
                                                            <a href="javascript:void(0);" id="{{ $invoiceDetail->id }}"
                                                               title="Delete"
                                                               class="btn btn-danger btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 delete-edit-invoice"><i class="fa fa-12 fa-trash-o"></i></a>
                                                            @csrf
                                                        </div>
                                                    </td>
                                                </tr>
                                                @php($index++)
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table table-bordered m-b-15">
                                            <tr>
                                                <th>Total Price (BDT)</th>
                                                <td><input type="text" id="editInvoiceTotalPrice" name="invoice_total_price"
                                                           class="form-control" value="{{ $invoice->invoice_total_price }}"
                                                           readonly/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" id="editInvoiceIndexNo" value="{{ $index }}">
                                    <select id="invoiceProductSelect" class="form-control"
                                            onchange="selectEditInvoiceProductInfo(this.value)">
                                        <option value="demo"> --- Add A Product ---</option>
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
