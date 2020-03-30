@extends('master')

@section('title', 'Manage Customers')

@section('body')
    <div class="row page-titles">
        <div class="col-md-3 align-self-center">
            <h3 class="text-primary">Accounts</h3>
        </div>
        <div class="col-md-5 text-center">
            <a href="{{ route('customer-info') }}" class="btn btn-link disabled">Manage Customers</a>
            <a href="javascript:void(0)" class="btn btn-link" onclick="openModal('#addCustomerModal')">Create A Customer</a>
        </div>
        <div class="col-md-4 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Sales</a></li>
                <li class="breadcrumb-item active">Customers</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Start Page Content -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card p-0">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-dark">All Customers</h5>
                    </div>
                    <div class="card-body p-15">
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
                                @foreach($customers as $customer)
                                <tr>
                                    <th>{{ $i++ }}</th>
                                    @if($customer->company_name)
                                    <td>{{ $customer->company_name }}</td>
                                    @else
                                    <td>{{ $customer->first_name.' '.$customer->last_name }}</td>
                                    @endif
                                    <td>{{ $customer->email_address }}</td>
                                    <td>{{ $customer->phone_number }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="javascript:void(0);" id="{{ $customer->id }}" title="Edit" class="btn btn-info btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2 edit-customer"><i class="fa fa-12 fa-edit"></i></a>
                                            <a href="javascript:void(0);" id="{{ $customer->id }}" title="Delete" class="btn btn-danger btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2 delete-customer"><i class="fa fa-12 fa-trash-o"></i></a>
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

        <!-- End PAge Content -->
    </div>

    <!-- Create Customer Modal -->
    <div class="modal" id="addCustomerModal" tabindex="-1" role="dialog" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-80" role="document">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <button type="button" class="close m-r-0 p-t-5 p-b-25" onclick="closeModal('#addCustomerModal')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-20">
                    <div class="basic-form">
                        <form action="{{ route('new-customer') }}" method="POST" id="addCustomerForm">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Company Name</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="company_name" class="form-control" placeholder="Company Name"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">First Name</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Last Name</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name"/>
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
                            <div class="form-group row m-0 p-0">
                                <label for="" class="col-md-3 col-form label"></label>
                                <div class="col-md-9 p-l-10 p-r-0">
                                    <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Create Customer Info">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Customer Modal -->
    <div class="modal" id="editCustomerModal" tabindex="-1" role="dialog" aria-labelledby="editCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-80" role="document">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <button type="button" class="close m-r-0 p-t-5 p-b-25" onclick="closeModal('#editCustomerModal')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-15">
                    <div class="basic-form">
                        <form action="{{ route('update-customer') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Company Name</span></label>
                                <div class="col-md-9">
                                    <input type="text" id="companyName" name="company_name" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">First Name</span></label>
                                <div class="col-md-9">
                                    <input type="text" id="firstName" name="first_name" class="form-control"/>
                                    <input type="hidden" name="customer_id" id="customerId"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Last Name</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="last_name" id="lastName" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Email Address</span></label>
                                <div class="col-md-9">
                                    <input type="email" name="email_address" id="customerEmail" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Phone Number</span></label>
                                <div class="col-md-9">
                                    <input type="number" name="phone_number" id="customerPhone" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Address</span></label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="address" id="customerAddress" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="form-group row m-0 p-0">
                                <label for="" class="col-md-3 col-form label"></label>
                                <div class="col-md-9 p-l-10 p-r-0">
                                    <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Update Customer Info">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
