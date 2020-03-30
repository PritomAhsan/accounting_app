@extends('master')

@section('title', 'Owners Equity')

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Accounts</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Accounts</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Accounts Head</a></li>
                <li class="breadcrumb-item active">Owners Equity</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-lg-6 p-r-7">
                <div class="card p-0 m-b-7">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-dark">Create Owners Equity</h5>
                    </div>
                    <div class="card-body p-15">
                        <div class="basic-form">
                            <form action="{{ route('new-owners-equity') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Owners Equity Name</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="owners_equity_name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Owners Equity Code</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="owners_equity_code" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Owners Equity Description</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="owners_equity_description" required>
                                    </div>
                                </div>
                                <div class="form-group row m-0 p-0">
                                    <label for="" class="col-md-4 col-form label"></label>
                                    <div class="col-md-8 p-l-10 p-r-0">
                                        <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Create Owners Equity">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 p-l-7">
                <div class="card p-0 m-b-7">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-dark">Create Sub Owners Equity</h5>
                    </div>
                    <div class="card-body p-15">
                        <div class="basic-form">
                            <form action="{{ route('new-sub-owners-equity') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Owners Equity Name</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="owners_equity_id" onchange="createSubOwnersEquityCode(this.value, '#subOwnersEquityCode');">
                                            <option> --- Select Owners Equity Name --- </option>
                                            @foreach($ownersEquities as $ownersEquity)
                                                <option value="{{ $ownersEquity->id }}">{{ $ownersEquity->owners_equity_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Sub Owners Equity Name</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="sub_owners_equity_name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Sub Owners Equity Code</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="sub_owners_equity_code" readonly id="subOwnersEquityCode" required>
                                    </div>
                                </div>
                                <div class="form-group row m-0 p-0">
                                    <label for="" class="col-md-4 col-form label"></label>
                                    <div class="col-md-8 p-l-10 p-r-0">
                                        <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Create Sub Owners Equity">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /# column -->
        </div>
        <!-- /# row -->

        <div class="row">
            <div class="col-lg-6 p-r-7">
                <div class="card p-0 m-t-7">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-dark">All Owners Equity</h5>
                    </div>
                    <div class="card-body p-15">
                        <div class="table-responsive">
                            <table class="table sortable table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th class="no-sort text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ownersEquities as $ownersEquity)
                                    <tr>
                                        <td>{{ $ownersEquity->id }}</td>
                                        <td>{{ $ownersEquity->owners_equity_name }}</td>
                                        <td>{{ $ownersEquity->owners_equity_code }}</td>
                                        <td>{{ $ownersEquity->owners_equity_description }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="javascript:void(0)" title="Edit" id="{{ $ownersEquity->id }}" class="edit-owners-equity btn btn-info btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2"><i class="fa fa-12 fa-edit"></i></a>
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
            <div class="col-lg-6 p-l-7">
                <div class="card p-0 m-t-7">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-dark">All Sub Owners Equity</h5>
                    </div>
                    <div class="card-body p-15">
                        <div class="table-responsive">
                            <table class="table sortable table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Main Name</th>
                                    <th>Sub Name</th>
                                    <th>Sub Code</th>
                                    <th class="no-sort text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subOwnersEquities as $subOwnersEquity)
                                    <tr>
                                        <td>{{ $subOwnersEquity->id }}</td>
                                        <td>{{ $subOwnersEquity->owners_equity_name }}</td>
                                        <td>{{ $subOwnersEquity->sub_owners_equity_name }}</td>
                                        <td>{{ $subOwnersEquity->sub_owners_equity_code }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="javascript:void(0)" title="Edit" id="{{ $subOwnersEquity->id }}" class="edit-sub-owners-equity btn btn-info btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2" onclick="openModal('#editSubOwnersEquityModal')"><i class="fa fa-12 fa-edit"></i></a>
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

    <!-- Edit Owners Equity Modal -->
    <div class="modal" id="editOwnersEquityModal" tabindex="-1" role="dialog" aria-labelledby="editOwnersEquityModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <button type="button" class="close m-r-0 p-t-5 p-b-25" onclick="closeModal('#editOwnersEquityModal')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-15">
                    <div class="basic-form">
                        <form action="{{ route('update-owners-equity') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Owners Equity Name</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="ownersEquityName" class="form-control" name="owners_equity_name" required>
                                    <input type="hidden" name="owners_equity_id" id="ownersEquityId" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Owners Equity Code</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="ownersEquityCode" class="form-control" name="owners_equity_code" required readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Owners Equity Description</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="ownersEquityDescription" class="form-control" name="owners_equity_description" required>
                                </div>
                            </div>
                            <div class="form-group row m-0 p-0">
                                <label for="" class="col-md-4 col-form label"></label>
                                <div class="col-md-8 p-l-10 p-r-0">
                                    <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Update Owners Equity Info">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Sub Owners Equity Modal -->
    <div class="modal" id="editSubOwnersEquityModal" tabindex="-1" role="dialog" aria-labelledby="editSubOwnersEquityModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <button type="button" class="close m-r-0 p-t-5 p-b-25" onclick="closeModal('#editSubOwnersEquityModal')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-15">
                    <div class="basic-form">
                        <form action="{{ route('update-sub-owners-equity') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Owners Equity Name</span></label>
                                <div class="col-md-8">
                                    <select id="editOwnersEquityId" class="form-control" name="owners_equity_id" onchange="createSubOwnersEquityCode(this.value, '#editSubOwnersEquityCode');">
                                        <option> --- Select Owners Equity Name --- </option>
                                        @foreach($ownersEquities as $ownersEquity)
                                            <option value="{{ $ownersEquity->id }}">{{ $ownersEquity->owners_equity_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Sub Owners Equity Name</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="subOwnersEquityName" class="form-control" name="sub_owners_equity_name" required>
                                    <input type="hidden" name="sub_owners_equity_id" id="subOwnersEquityId">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Sub Owners Equity Code</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="editSubOwnersEquityCode" class="form-control" name="sub_owners_equity_code" readonly required>
                                </div>
                            </div>
                            <div class="form-group row m-0 p-0">
                                <label for="" class="col-md-4 col-form label"></label>
                                <div class="col-md-8 p-l-10 p-r-0">
                                    <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Update Sub Owners Equity Info">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
