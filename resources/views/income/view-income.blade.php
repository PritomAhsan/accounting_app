@extends('master')

@section('title', 'Income/Revenue')

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Accounts</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Accounts</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Accounts Head</a></li>
                <li class="breadcrumb-item active">Income/Revenue</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-lg-6 p-r-7">
                <div class="card p-0 m-b-7">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-dark">Create Income</h5>
                    </div>
                    <div class="card-body p-15">
                        <div class="basic-form">
                            <form action="{{ route('new-income') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Income Name</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="income_name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Income Code</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="income_code" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Income Description</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="income_description" required>
                                    </div>
                                </div>
                                <div class="form-group row m-0 p-0">
                                    <label for="" class="col-md-4 col-form label"></label>
                                    <div class="col-md-8 p-l-10 p-r-0">
                                        <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Save Income info">
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
                        <h5 class="card-title text-dark">Create Sub Income</h5>
                    </div>
                    <div class="card-body p-15">
                        <div class="basic-form">
                            <form action="{{ route('new-sub-income') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Income Name</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="income_id" onchange="createSubIncomeCode(this.value, '#subIncomeCode');">
                                            <option> --- Select Income Name --- </option>
                                            @foreach($incomes as $income)
                                                <option value="{{ $income->id }}">{{ $income->income_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Sub Income Name</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="sub_income_name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Sub Income Code</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="sub_income_code" id="subIncomeCode" readonly required>
                                    </div>
                                </div>
                                <div class="form-group row m-0 p-0">
                                    <label for="" class="col-md-4 col-form label"></label>
                                    <div class="col-md-8 p-l-10 p-r-0">
                                        <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Save Sub Income info">
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
                        <h5 class="card-title text-dark">All Income</h5>
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
                                @foreach($incomes as $income)
                                    <tr>
                                        <td>{{ $income->id }}</td>
                                        <td>{{ $income->income_name }}</td>
                                        <td>{{ $income->income_code }}</td>
                                        <td>{{ $income->income_description }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="javascript:void(0)" title="Edit" id="{{ $income->id }}" class="edit-income btn btn-info btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2"><i class="fa fa-12 fa-edit"></i></a>
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
                        <h5 class="card-title text-dark">All Sub Income</h5>
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
                                @foreach($subIncomes as $subIncome)
                                    <tr>
                                        <td>{{ $subIncome->id }}</td>
                                        <td>{{ $subIncome->income_name }}</td>
                                        <td>{{ $subIncome->sub_income_name }}</td>
                                        <td>{{ $subIncome->sub_income_code }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="javascript:void(0)" title="Edit" id="{{ $subIncome->id }}" class="edit-sub-income btn btn-info btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2"><i class="fa fa-12 fa-edit"></i></a>
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

    <!-- Edit Income Modal -->
    <div class="modal" id="editIncomeModal" tabindex="-1" role="dialog" aria-labelledby="editIncomeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <button type="button" class="close m-r-0 p-t-5 p-b-25" onclick="closeModal('#editIncomeModal')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-15">
                    <div class="basic-form">
                        <form action="{{ route('update-income') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Income Name</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="incomeName" class="form-control" name="income_name" required>
                                    <input type="hidden" name="income_id" id="incomeId"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Income Code</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="incomeCode" class="form-control" name="income_code" required readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Income Description</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="incomeDescription" class="form-control" name="income_description" required>
                                </div>
                            </div>
                            <div class="form-group row m-0 p-0">
                                <label for="" class="col-md-4 col-form label"></label>
                                <div class="col-md-8 p-l-10 p-r-0">
                                    <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Update Income info">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Sub Income Modal -->
    <div class="modal" id="editSubIncomeModal" tabindex="-1" role="dialog" aria-labelledby="editSubIncomeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <button type="button" class="close m-r-0 p-t-5 p-b-25" onclick="closeModal('#editSubIncomeModal')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-15">
                    <div class="basic-form">
                        <form action="{{ route('update-sub-income') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Income Name</span></label>
                                <div class="col-md-8">
                                    <select id="editIncomeId" class="form-control" name="income_id" onchange="createSubIncomeCode(this.value, '#editSubIncomeCode');">
                                        <option> --- Select Income Name --- </option>
                                        @foreach($incomes as $income)
                                            <option value="{{ $income->id }}">{{ $income->income_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Sub Income Name</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="subIncomeName" class="form-control" name="sub_income_name" required>
                                    <input type="hidden" name="sub_income_id" id="subIncomeId"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Sub Income Code</span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="sub_income_code" id="editSubIncomeCode" readonly required>
                                </div>
                            </div>
                            <div class="form-group row m-0 p-0">
                                <label for="" class="col-md-4 col-form label"></label>
                                <div class="col-md-8 p-l-10 p-r-0">
                                    <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Update Sub Income info">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
