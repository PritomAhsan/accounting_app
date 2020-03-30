@extends('master')

@section('title', 'Add User')

@section('body')
    <div class="row page-titles">
        <div class="col-md-3 align-self-center">
            <h3 class="text-primary">User Info</h3>
        </div>
        <div class="col-md-5 text-center">
            <a href="{{ route('add-user') }}" class="btn btn-link disabled">Add User</a>
            <a href="{{ route('manage-user') }}" class="btn btn-link">Manage User</a>
        </div>
        <div class="col-md-4 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">User Info</a></li>
                <li class="breadcrumb-item active">Add User</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('new-user') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">User Name</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">User Email</label>
                                    <div class="col-md-10">
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Password</label>
                                    <div class="col-md-10">
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Assign Role</label>
                                    <div class="col-md-10 checkbox">
                                        @foreach($roles as $role)
                                            @if($role->name != 'Main Admin')
                                                <label class="m-t-10 m-b-0"><input type="checkbox" value="{{ $role->id }}" name="role[]"> {{ $role->name }} ||</label>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group row m-0">
                                    <label for="" class="col-md-2 col-form label"></label>
                                    <div class="col-md-8 p-l-10">
                                        <input type="submit" name="btn" class="btn btn-flat btn-primary" value="Create User">
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

        <!-- End PAge Content -->
    </div>
@endsection
