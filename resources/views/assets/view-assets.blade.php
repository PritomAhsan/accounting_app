@extends('master')

@section('title', 'Assets')

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Accounts</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Accounts</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Accounts Head</a></li>
                <li class="breadcrumb-item active">Assets</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-lg-6 p-r-7">
                <div class="card p-0 m-b-7">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-dark">Create Asset</h5>
                    </div>
                    <div class="card-body p-15">
                        <div class="basic-form">
                            <form action="{{ route('new-asset') }}" method="POST" class="validate">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Asset Name</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="asset_name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Asset Code</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="asset_code" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Asset Description</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="asset_description" required>
                                    </div>
                                </div>
                                <div class="form-group row m-0 p-0">
                                    <label for="" class="col-md-4 col-form label"></label>
                                    <div class="col-md-8 p-l-10 p-r-0">
                                        <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Create Asset">
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
                        <h5 class="card-title text-dark">Create Sub Asset</h5>
                    </div>
                    <div class="card-body p-15">
                        <div class="basic-form">
                            <form action="{{ route('new-sub-asset') }}" method="POST" class="validate">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Asset Name</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="asset_id" onchange="createSubAssetCode(this.value, '#subAssetCode');" required>
                                            <option> --- Select Asset Name --- </option>
                                            @foreach($assets as $asset)
                                                <option value="{{ $asset->id }}">{{ $asset->asset_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Sub Asset Name</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="sub_asset_name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Sub Asset Code</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="sub_asset_code" id="subAssetCode" readonly required>
                                    </div>
                                </div>
                                <div class="form-group row m-0 p-0">
                                    <label for="" class="col-md-4 col-form label"></label>
                                    <div class="col-md-8 p-l-10 p-r-0">
                                        <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Create Sub Asset">
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
                        <h5 class="card-title text-dark">All Assets</h5>
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
                                @foreach($assets as $asset)
                                    <tr>
                                        <td>{{ $asset->id }}</td>
                                        <td>{{ $asset->asset_name }}</td>
                                        <td>{{ $asset->asset_code }}</td>
                                        <td>{{ $asset->asset_description }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a title="Edit" href="javascript:void(0)" id="{{ $asset->id }}" class="edit-asset btn btn-info btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2"><i class="fa fa-12 fa-edit"></i></a>
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
                        <h5 class="card-title text-dark">All sub Assets</h5>
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
                                @foreach($subAssets as $subAsset)
                                    <tr>
                                        <td>{{ $subAsset->id }}</td>
                                        <td>{{ $subAsset->asset_name }}</td>
                                        <td>{{ $subAsset->sub_asset_name }}</td>
                                        <td>{{ $subAsset->sub_asset_code }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="javascript:void(0)" title="Edit" id="{{ $subAsset->id }}" class="edit-sub-asset btn btn-info btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2"><i class="fa fa-12 fa-edit"></i></a>
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

    <!-- Edit Asset Modal -->
    <div class="modal" id="editAssetModal" tabindex="-1" role="dialog" aria-labelledby="editAssetModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <button type="button" class="close m-r-0 p-t-5 p-b-25" onclick="closeModal('#editAssetModal')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-15">
                    <div class="basic-form">
                        <form action="{{ route('update-asset') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Asset Name</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="assetName" class="form-control" name="asset_name" required>
                                    <input type="hidden" name="asset_id" id="assetId" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Asset Code</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="assetCode" class="form-control" name="asset_code" required readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Asset Description</span></label>
                                <div class="col-md-8">
                                    <textarea name="asset_description" id="assetDescription" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row m-0 p-0">
                                <label for="" class="col-md-4 col-form label"></label>
                                <div class="col-md-8 p-l-10 p-r-0">
                                    <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Update Asset Info">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Sub Asset Modal -->
    <div class="modal" id="editSubAssetModal" tabindex="-1" role="dialog" aria-labelledby="editSubAssetModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <button type="button" class="close m-r-0 p-t-5 p-b-25" onclick="closeModal('#editSubAssetModal')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-15">
                    <div class="basic-form">
                        <form action="{{ route('update-sub-asset') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Asset Name</span></label>
                                <div class="col-md-8">
                                    <select id="editAssetId" class="form-control" name="asset_id" onchange="createSubAssetCode(this.value, '#editSubAssetCode');">
                                        <option> --- Select Asset Name --- </option>
                                        @foreach($assets as $asset)
                                            <option value="{{ $asset->id }}">{{ $asset->asset_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Sub Asset Name</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="subAssetName" class="form-control" name="sub_asset_name" required>
                                    <input type="hidden" name="sub_asset_id" id="subAssetId"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Sub Asset Code</span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="sub_asset_code" readonly id="editSubAssetCode" required>
                                </div>
                            </div>
                            <div class="form-group row m-0 p-0">
                                <label for="" class="col-md-4 col-form label"></label>
                                <div class="col-md-8 p-l-10 p-r-0">
                                    <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Update Sub Asset Info">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
