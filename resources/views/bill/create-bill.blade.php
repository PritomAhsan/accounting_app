@extends('master')

@section('title', 'Create A Bill')

@section('body')
    <div class="row page-titles">
        <div class="col-md-3 align-self-center">
            <h3 class="text-primary">Purchase</h3>
        </div>
        <div class="col-md-5 text-center">
            <a href="{{ route('bill-info') }}" class="btn btn-link">Manage Bills</a>
            <a href="{{ route('create-bill') }}" class="btn btn-link disabled">Create A Bill</a>
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
        <form action="{{ route('new-bill') }}" method="POST" name="billCreateForm">
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
                            <h5 class="card-title text-dark">New Bill</h5>
                        </div>
                        <div class="card-body p-20">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="billDetails" class="p-b-20">
                                        <h3> Vendor Info </h3>
                                        <span><b id="billVendorName" readonly>Vendor One</b></span><br/>
                                        <input type="hidden" id="billVendorId" name="vendor_id"/>
                                        <span id="billVendorPhoneNumber">017xxxxxxxx</span><br/>
                                        <span id="billVendorEmailAddress">vendor@email.com</span><br/>
                                        <span id="billVendorAddress">14, Main Street, City, Country</span><br/>
                                    </div>
                                    <div>
                                        <a href="javascript:void(0)" id="changeVendor" class="btn btn-flat btn-primary m-b-20">Change Vendor</a>
                                    </div>
                                    <div id="billVendor">
                                        <select class="form-control m-b-15" onchange="selectVendorInfo(this.value)">
                                            <option> --- Add A Vendor --- </option>
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
                                                <td>Bill Number : &nbsp;</td>
                                                <td>
                                                    <input type="text" readonly id="billNumber" value="{{ $billNumber }}" name="bill_number" class="form-control"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Bill Date : &nbsp;</td>
                                                <td><input type="date" id="billDate" value="{{ date('Y-m-d') }}" name="bill_date" class="form-control"/></td>
                                            </tr>
                                            <tr>
                                                <td>Due Date : &nbsp;</td>
                                                <td><input type="date" required id="billDueDate" value="{{ date('Y-m-d') }}" name="due_date" class="form-control"/></td>
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
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table table-bordered m-b-20">
                                            <tr>
                                                <th>Total Price (BDT) </th>
                                                <td><input type="text" id="billTotalPrice" name="bill_total_price" class="form-control" value="0" readonly/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <select id="billProductSelect" class="form-control" onchange="selectBillProductInfo(this.value)">
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
