@extends('master')

@section('title', 'Manage Vendors')

@section('body')
    <div class="row page-titles">
        <div class="col-md-3 align-self-center">
            <h3 class="text-primary">Purchase</h3>
        </div>
        <div class="col-md-5 text-center">
            <a href="{{ route('vendor-info') }}" class="btn btn-link disabled">Manage Vendors</a>
            <a href="javascript:void(0)" class="btn btn-link" onclick="openModal('#addVendorModal')">Create A Vendor</a>
        </div>
        <div class="col-md-4 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Purchase</a></li>
                <li class="breadcrumb-item active">Vendor</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Start Page Content -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card p-0">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-dark">All Vendors</h5>
                    </div>
                    <div class="card-body p-20">
                        <div class="table-responsive">
                            <table class="table exportable table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th class="no-sort no-export text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($vendors as $vendor)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $vendor->vendor_name }}</td>
                                    <td>{{ $vendor->email_address }}</td>
                                    <td>{{ $vendor->phone_number }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="javascript:void(0)" title="Edit" id="{{ $vendor->id }}" class="btn btn-info btn-rounded btn-xs p-l-10 p-r-8 p-t-3 p-b-1 m-l-2 m-r-2 edit-vendor"><i class="fa fa-12 fa-edit"></i></a>
                                            <a href="javascript:void(0)" title="Delete" id="{{ $vendor->id }}" class="btn btn-danger btn-rounded btn-xs p-l-10 p-r-8 p-t-3 p-b-1 m-l-2 m-r-2 delete-btn"><i class="fa fa-12 fa-trash-o"></i></a>
                                        </div>
                                        @csrf
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

        <!-- End PAge Content -->
    </div>

    <!-- Create Vendor Modal -->
    <div class="modal" id="addVendorModal" tabindex="-1" role="dialog" aria-labelledby="addVendorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-70" role="document">
            <div class="modal-content">
                <div class="modal-header p-0 m-b-10">
                    <button type="button" class="close m-r-0 p-t-5 p-b-25" onclick="closeModal('#addVendorModal')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-20">
                    <div class="basic-form">
                        <form action="{{ route('new-vendor') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Vendor Name</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="vendor_name" class="form-control" placeholder="Vendor Name"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Email Address</span></label>
                                <div class="col-md-9">
                                    <input type="email" name="email_address" class="form-control" placeholder="Email Address"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Phone Number</span></label>
                                <div class="col-md-9">
                                    <input type="number" name="phone_number" class="form-control" placeholder="Phone Number"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Address</span></label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="address" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Account Number</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="account_number" class="form-control" placeholder="Account Number"/>
                                </div>
                            </div>
                            <div class="form-group row m-0 p-0">
                                <label for="" class="col-md-3 col-form label"></label>
                                <div class="col-md-9 p-l-10 p-r-0">
                                    <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Create Vendor Info">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Vendor Modal -->
    <div class="modal" id="editVendorModal" tabindex="-1" role="dialog" aria-labelledby="editVendorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-70" role="document">
            <div class="modal-content">
                <div class="modal-header p-0 m-b-10">
                    <button type="button" class="close m-r-0 p-t-5 p-b-25" onclick="closeModal('#editVendorModal')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-20">
                    <div class="basic-form">
                        <form action="{{ route('update-vendor') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Vendor Name</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="vendor_name" id="vendorName" class="form-control" placeholder="Vendor Name"/>
                                    <input type="hidden" name="vendor_id" id="vendorId"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Email Address</span></label>
                                <div class="col-md-9">
                                    <input type="email" name="email_address" id="vendorEmail" class="form-control" placeholder="Email Address"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Phone Number</span></label>
                                <div class="col-md-9">
                                    <input type="number" name="phone_number" id="vendorPhone" class="form-control" placeholder="Phone Number"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Address</span></label>
                                <div class="col-md-9">
                                    <textarea id="vendorAddress" class="form-control" name="address" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Account Number</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="account_number" id="vendorAccount" class="form-control" placeholder="Account Number"/>
                                </div>
                            </div>
                            <div class="form-group row m-0 p-0">
                                <label for="" class="col-md-3 col-form label"></label>
                                <div class="col-md-9 p-l-10 p-r-0">
                                    <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Update Vendor Info">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
