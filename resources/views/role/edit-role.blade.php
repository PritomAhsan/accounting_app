@extends('master')

@section('title', 'Edit Role')

@section('body')
    <div class="row page-titles">
        <div class="col-md-3 align-self-center">
            <h3 class="text-primary">User Info</h3>
        </div>
        <div class="col-md-5 text-center">
            <a href="{{ route('add-role') }}" class="btn btn-link">Add Role</a>
            <a href="{{ route('manage-role') }}" class="btn btn-link">Manage Role</a>
        </div>
        <div class="col-md-4 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">User Info</a></li>
                <li class="breadcrumb-item active">Edit Role</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body p-20">
                        <div class="basic-form">
                            <form action="{{ route('update-role') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Role Name</label>
                                    <div class="col-md-10">
                                        <input type="text" value="{{ $role->name }}" class="form-control" name="name" required>
                                        <input type="hidden" name="role_id" value="{{ $role->id }}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Description</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="description" value="{{ $role->description }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Assign Job</label>
                                    <div class="col-md-10 checkbox">
                                        @foreach($routeLists as $routeList)
                                            @if($routeList->getName() != null && $routeList->getName() != '/' && $routeList->getName() != 'logout' && $routeList->getName() != 'login' && $routeList->getName() != 'home' && $routeList->getName() != 'password.request' && $routeList->getName() != 'password.email' && $routeList->getName() != 'password.reset' && $routeList->getName() != 'register')
                                                <label class="m-t-10 m-b-0"><input type="checkbox" value="{{ $routeList->getName() }}" @foreach($roleRoutes as $roleRoute) {{ $routeList->getName() == $roleRoute->route_name ? 'checked' : '' }} @endforeach name="route_name[]"> {{ $routeList->getName() }} ||</label>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group row m-0">
                                    <label for="" class="col-md-2 col-form label"></label>
                                    <div class="col-md-10 p-l-10">
                                        <input type="submit" name="btn" class="btn btn-flat btn-primary" value="Update Role">
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
