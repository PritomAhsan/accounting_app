@extends('master')

@section('title', 'Liabilities')

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Accounts</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Accounts</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Accounts Head</a></li>
                <li class="breadcrumb-item active">Liabilities</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-lg-6 p-r-7">
                <div class="card p-0 m-b-7">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-dark">Main Liabilities Name</h5>
                    </div>
                    <div class="card-body p-15">
                        <div class="basic-form">
                            <form action="{{ route('new-liabilities') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Liabilities Name</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="liabilitie_name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Liabilities Code</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="liabilitie_code" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Liabilities Description</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="liabilitie_description" required>
                                    </div>
                                </div>
                                <div class="form-group row m-0 p-0">
                                    <label for="" class="col-md-4 col-form label"></label>
                                    <div class="col-md-8 p-l-10 p-r-0">
                                        <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Create Liabilities">
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
                        <h5 class="card-title text-dark">Sub Liabilities Name</h5>
                    </div>
                    <div class="card-body p-15">
                        <div class="basic-form">
                            <form action="{{ route('new-sub-liabilities') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Liabilities Name</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="liabilitie_id" onchange="createSubLiabilitiesCode(this.value, '#subLiabilitieCode');">
                                            <option> --- Select Liabilities Name --- </option>
                                            @foreach($liabilities as $liabilitie)
                                                <option value="{{ $liabilitie->id }}">{{ $liabilitie->liabilitie_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Sub Liabilities Name</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="sub_liabilitie_name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Sub Liabilities Code</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="sub_liabilitie_code" readonly id="subLiabilitieCode" required>
                                    </div>
                                </div>
                                <div class="form-group row m-0 p-0">
                                    <label for="" class="col-md-4 col-form label"></label>
                                    <div class="col-md-8 p-l-10 p-r-0">
                                        <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Create Sub Liabilities">
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
                        <h5 class="card-title text-dark">All Main Liabilities</h5>
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
                                @foreach($liabilities as $liabilitie)
                                    <tr>
                                        <td>{{ $liabilitie->id }}</td>
                                        <td>{{ $liabilitie->liabilitie_name }}</td>
                                        <td>{{ $liabilitie->liabilitie_code }}</td>
                                        <td>{{ $liabilitie->liabilitie_description }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="javascript:void(0)" title="Edit" id="{{ $liabilitie->id }}" class="edit-liabilitie btn btn-info btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2"><i class="fa fa-12 fa-edit"></i></a>
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
                        <h5 class="card-title text-dark">All Sub Liabilities</h5>
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
                                @foreach($subLiabilities as $subLiabilitie)
                                    <tr>
                                        <td>{{ $subLiabilitie->id }}</td>
                                        <td>{{ $subLiabilitie->liabilitie_name }}</td>
                                        <td>{{ $subLiabilitie->sub_liabilitie_name }}</td>
                                        <td>{{ $subLiabilitie->sub_liabilitie_code }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="javascript:void(0)" title="Edit" id="{{ $subLiabilitie->id }}" class="edit-sub-liabilitie btn btn-info btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2"><i class="fa fa-12 fa-edit"></i></a>
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

    <!-- Edit Liability Modal -->
    <div class="modal" id="editLiabilitieModal" tabindex="-1" role="dialog" aria-labelledby="editLiabilitieModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <button type="button" class="close m-r-0 p-t-5 p-b-25" onclick="closeModal('#editLiabilitieModal')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-15">
                    <div class="basic-form">
                        <form action="{{ route('update-liabilities') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Liabilities Name</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="liabilitieName" class="form-control" name="liabilitie_name" required>
                                    <input type="hidden" name="liabilitie_id" id="liabilitieId" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Liabilities Code</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="liabilitieCode" class="form-control" name="liabilitie_code" required readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Liabilities Description</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="liabilitieDescription" class="form-control" name="liabilitie_description" required>
                                </div>
                            </div>
                            <div class="form-group row m-0 p-0">
                                <label for="" class="col-md-4 col-form label"></label>
                                <div class="col-md-8 p-l-10 p-r-0">
                                    <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Update Liability Info">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Sub Liability Modal -->
    <div class="modal" id="editSubLiabilitieModal" tabindex="-1" role="dialog" aria-labelledby="editSubLiabilitieModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <button type="button" class="close m-r-0 p-t-5 p-b-25" onclick="closeModal('#editSubLiabilitieModal')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-15">
                    <div class="basic-form">
                        <form action="{{ route('update-sub-liabilities') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Liabilities Name</span></label>
                                <div class="col-md-8">
                                    <select class="form-control" name="liabilitie_id" id="editLiabilitieId" onchange="createSubLiabilitiesCode(this.value, '#editSubLiabilitieCode');">
                                        <option> --- Select Liabilities Name --- </option>
                                        @foreach($liabilities as $liabilitie)
                                            <option value="{{ $liabilitie->id }}">{{ $liabilitie->liabilitie_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Sub Liabilities Name</span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="sub_liabilitie_name" id="subLiabilitieName" required>
                                    <input type="hidden" name="sub_liabilitie_id" id="subLiabilitieId" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Sub Liabilities Code</span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="sub_liabilitie_code" readonly id="editSubLiabilitieCode" required>
                                </div>
                            </div>
                            <div class="form-group row m-0 p-0">
                                <label for="" class="col-md-4 col-form label"></label>
                                <div class="col-md-8 p-l-10 p-r-0">
                                    <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Update Sub Liability Info">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
