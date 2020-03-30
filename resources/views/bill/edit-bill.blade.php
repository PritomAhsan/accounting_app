@extends('master')

@section('title', 'Edit Bill')

@section('body')
    <div class="row page-titles">
        <div class="col-md-3 align-self-center">
            <h3 class="text-primary">Purchase</h3>
        </div>
        <div class="col-md-5 text-center">
            <a href="{{ route('bill-info') }}" class="btn btn-link">Manage Bills</a>
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
        <form action="{{ route('update-bill') }}" method="POST" name="editBillCreateForm">
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
                            <h5 class="card-title text-dark">Edit Bill</h5>
                        </div>
                        <div class="card-body p-20">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="editBillDetails" class="p-b-20">
                                        <h3> Vendor Info </h3>
                                        <span><b id="billVendorName" readonly>{{ $vendor->vendor_name }}</b></span><br/>
                                        <input type="hidden" id="billVendorId" value="{{ $vendor->id }}"
                                               name="vendor_id"/>
                                        <span id="billVendorPhoneNumber">{{ $vendor->phone_number }}</span><br/>
                                        <span id="billVendorEmailAddress">{{ $vendor->email_address }}</span><br/>
                                        <span id="billVendorAddress">{{ $vendor->address}}</span><br/>
                                    </div>
                                    <div>
                                        <a href="javascript:void(0)" id="editChangeVendor"
                                           class="btn btn-flat btn-primary m-b-20">Change Vendor</a>
                                    </div>
                                    <div id="editBillVendor">
                                        <select class="form-control m-b-15" onchange="selectEditVendorInfo(this.value)">
                                            <option> --- Add A Vendor ---</option>
                                            @foreach($vendors as $vendor)
                                                <option value="{{ $vendor->id }}">{{ $vendor->vendor_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table pull-right m-b-20">
                                            <tr>
                                                <td>Invoice Number : &nbsp;</td>
                                                <td>
                                                    <input type="text" readonly id="billNumber"
                                                           value="{{ $bill->bill_number }}" name="bill_number"
                                                           class="form-control"/>
                                                    <input type="hidden" value="{{ $bill->id }}" id="billId"
                                                           name="bill_id"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Bill Date : &nbsp;</td>
                                                <td><input type="date" id="billDate" value="{{ $bill->bill_date }}"
                                                           name="bill_date" class="form-control"/></td>
                                            </tr>
                                            <tr>
                                                <td>Due Date : &nbsp;</td>
                                                <td><input type="date" required id="billDueDate"
                                                           value="{{ $bill->due_date }}" name="due_date"
                                                           class="form-control"/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped m-b-20" id="billProductTable">
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
                                            @php($index=0)
                                            @foreach($billDetails as $billDetail)
                                                <tr>
                                                    <td>
                                                        <input type="text" value="{{ $billDetail->item_name }}"
                                                               name="bill_item[{{ $index }}][item_name]" readonly
                                                               class="form-control"/>
                                                        <input type="hidden" value="{{ $billDetail->item_id }}"
                                                               name="bill_item[{{ $index }}][item_id]"/>
                                                        <input type="hidden" value="{{ $billDetail->id }}"
                                                               name="bill_item[{{ $index }}][bill_detail_id]"/>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="bill_item[{{ $index }}][item_description]"
                                                               value="{{ $billDetail->item_description }}"
                                                               class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="number" id='qty{{ $index }}'
                                                               value="{{ $billDetail->item_quantity }}"
                                                               onkeyup="updateEditBillProductTotalPrice({{ $index }})"
                                                               name="bill_item[{{ $index }}][item_quantity]"
                                                               class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" id='price{{ $index }}'
                                                               value="{{ $billDetail->item_price }}"
                                                               onkeyup="updateEditBillProductTotalPrice({{ $index }})"
                                                               name="bill_item[{{ $index }}][item_price]"
                                                               class="form-control">
                                                    </td>
                                                    <td class="bill-total-price"
                                                        id="{{ 'res'.$index }}">{{ $billDetail->item_price*$billDetail->item_quantity }}</td>
                                                    <td>
                                                        <div class="d-flex justify-content-between">
                                                            <a href="javascript:void(0);" title="Delete"
                                                               id="{{ $billDetail->id }}" class="btn btn-danger btn-rounded btn-xs p-l-10 p-r-8 p-t-3 p-b-1 delete-edit-bill"><i class="fa fa-12 fa-trash-o"></i></a>
                                                        </div>
                                                        @csrf
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
                                        <table class="table table-bordered m-b-20">
                                            <tr>
                                                <th>Total Price (BDT)</th>
                                                <td><input type="text" id="editBillTotalPrice" name="bill_total_price"
                                                           class="form-control" value="{{ $bill->bill_total_price }}" readonly/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" id="editBillIndexNo" value="{{ $index }}">
                                    <select id="billProductSelect" class="form-control" onchange="selectEditBillProductInfo(this.value)">
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

    <!-- End PAge Content -->
@endsection
