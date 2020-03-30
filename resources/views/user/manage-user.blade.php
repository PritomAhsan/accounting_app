@extends('master')

@section('title', 'Manage User')

@section('body')
    <div class="row page-titles">
        <div class="col-md-3 align-self-center">
            <h3 class="text-primary">User Info</h3>
        </div>
        <div class="col-md-5 text-center">
            <a href="{{ route('add-user') }}" class="btn btn-link">Add User</a>
            <a href="{{ route('manage-user') }}" class="btn btn-link disabled">Manage User</a>
        </div>
        <div class="col-md-4 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">User Info</a></li>
                <li class="breadcrumb-item active">Manage User</li>
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
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th class="no-sort text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    @if($user->admin_status != 1)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a title="Edit" class="btn btn-info btn-rounded btn-xs p-l-10 p-r-8 p-t-3 p-b-1 m-l-2 m-r-2" href="{{ route('edit-user', ['id'=>$user->id]) }}"><i class="fa fa-12 fa-edit"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
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
