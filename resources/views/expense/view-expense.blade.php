@extends('master')

@section('title', 'Expense')

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Accounts</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Accounts</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Accounts Head</a></li>
                <li class="breadcrumb-item active">Expense</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-lg-6 p-r-7">
                <div class="card p-0 m-b-7">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-dark">Create Expense</h5>
                    </div>
                    <div class="card-body p-15">
                        <div class="basic-form">
                            <form action="{{ route('new-expense') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Expense Name</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="expense_name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Expense Code</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="expense_code" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Expense Description</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="expense_description" required>
                                    </div>
                                </div>
                                <div class="form-group row m-0 p-0">
                                    <label for="" class="col-md-4 col-form label"></label>
                                    <div class="col-md-8 p-l-10 p-r-0">
                                        <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Save Expense Info">
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
                        <h5 class="card-title text-dark">Create Sub Expense</h5>
                    </div>
                    <div class="card-body p-15">
                        <div class="basic-form">
                            <form action="{{ route('new-sub-expense') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Expense Name</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="expense_id" onchange="createSubExpenseCode(this.value, '#subExpenseCode');">
                                            <option> --- Select Expense Name --- </option>
                                            @foreach($expenses as $expense)
                                                <option value="{{ $expense->id }}">{{ $expense->expense_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Sub Expense Name</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="sub_expense_name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><span class="float-right text-right">Sub Expense Code</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="sub_expense_code" readonly id="subExpenseCode" required>
                                    </div>
                                </div>
                                <div class="form-group row m-0 p-0">
                                    <label for="" class="col-md-4 col-form label"></label>
                                    <div class="col-md-8 p-l-10 p-r-0">
                                        <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Save Sub Expense Info">
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
                        <h5 class="card-title text-dark">All Expense</h5>
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
                                @foreach($expenses as $expense)
                                    <tr>
                                        <td>{{ $expense->id }}</td>
                                        <td>{{ $expense->expense_name }}</td>
                                        <td>{{ $expense->expense_code }}</td>
                                        <td>{{ $expense->expense_description }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="javascript:void(0)" title="Edit" id="{{ $expense->id }}" class="edit-expense btn btn-info btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2"><i class="fa fa-12 fa-edit"></i></a>
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
                        <h5 class="card-title text-dark">All Sub Expense</h5>
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
                                @foreach($subExpenses as $subExpense)
                                    <tr>
                                        <td>{{ $subExpense->id }}</td>
                                        <td>{{ $subExpense->expense_name }}</td>
                                        <td>{{ $subExpense->sub_expense_name }}</td>
                                        <td>{{ $subExpense->sub_expense_code }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="javascript:void(0)" title="Edit" id="{{ $subExpense->id }}" class="edit-sub-expense btn btn-info btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2"><i class="fa fa-12 fa-edit"></i></a>
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

    <!-- Edit Expense Modal -->
    <div class="modal" id="editExpenseModal" tabindex="-1" role="dialog" aria-labelledby="editExpenseModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <button type="button" class="close m-r-0 p-t-5 p-b-25" onclick="closeModal('#editExpenseModal')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-15">
                    <div class="basic-form">
                        <form action="{{ route('update-expense') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Expense Name</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="expenseName" class="form-control" name="expense_name" required>
                                    <input type="hidden" name="expense_id" id="expenseId"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Expense Code</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="expenseCode" class="form-control" name="expense_code" required readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Expense Description</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="expenseDescription" class="form-control" name="expense_description" required>
                                </div>
                            </div>
                            <div class="form-group row m-0 p-0">
                                <label for="" class="col-md-4 col-form label"></label>
                                <div class="col-md-8 p-l-10 p-r-0">
                                    <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Update Expense Info">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Sub Expense Modal -->
    <div class="modal" id="editSubExpenseModal" tabindex="-1" role="dialog" aria-labelledby="editSubExpenseModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <button type="button" class="close m-r-0 p-t-5 p-b-25" onclick="closeModal('#editSubExpenseModal')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-15">
                    <div class="basic-form">
                        <form action="{{ route('update-sub-expense') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Expense Name</span></label>
                                <div class="col-md-8">
                                    <select id="editExpenseId" class="form-control" name="expense_id" onchange="createSubExpenseCode(this.value, '#editSubExpenseCode');">
                                        <option> --- Select Expense Name --- </option>
                                        @foreach($expenses as $expense)
                                            <option value="{{ $expense->id }}">{{ $expense->expense_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Sub Expense Name</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="subExpenseName" class="form-control" name="sub_expense_name" required>
                                    <input type="hidden" name="sub_expense_id" id="subExpenseId"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"><span class="float-right text-right">Sub Expense Code</span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="sub_expense_code" readonly id="editSubExpenseCode" required>
                                </div>
                            </div>
                            <div class="form-group row m-0 p-0">
                                <label for="" class="col-md-4 col-form label"></label>
                                <div class="col-md-8 p-l-10 p-r-0">
                                    <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Update Sub Expense Info">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
