@extends('master')

@section('title', 'Manage Role')

@section('body')
    <div class="row page-titles">
        <div class="col-md-3 align-self-center">
            <h3 class="text-primary">User Info</h3>
        </div>
        <div class="col-md-5 text-center">
            <a href="{{ route('add-role') }}" class="btn btn-link">Add Role</a>
            <a href="{{ route('manage-role') }}" class="btn btn-link disabled">Manage Role</a>
        </div>
        <div class="col-md-4 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">User Info</a></li>
                <li class="breadcrumb-item active">Manage Role</li>
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
                            <table class="table sortable table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Role Name</th>
                                    <th class="no-sort">Description</th>
                                    <th class="no-sort">Route List</th>
                                    <th class="no-sort text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->description }}</td>
                                        <td>
                                            @foreach($roleRoutes as $roleRoute)
                                                @if($role->name == $roleRoute->role_name)
                                                    {{ $roleRoute->route_name.' ,' }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a title="Edit" class="btn btn-info btn-rounded btn-xs p-l-10 p-r-8 p-t-3 p-b-1 m-l-2 m-r-2" href="{{ route('edit-role', ['id'=>$role->id]) }}"><i class="fa fa-12 fa-edit"></i></a>
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
            <!-- /# column -->
        </div>
        <!-- /# row -->

        <!-- End PAge Content -->
    </div>
@endsection
