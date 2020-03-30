@extends('master')

@section('title', 'Add Journal Transaction')

@section('body')
    <div class="row page-titles">
        <div class="col-md-3 align-self-center">
            <h3 class="text-primary">Accounts</h3>
        </div>
        <div class="col-md-5 text-center">
            <a href="{{ route('journal-transaction') }}" class="btn btn-link">Manage Journal Transaction</a>
            <a href="{{ route('add-journal-transaction') }}" class="btn btn-link disabled">Add Journal Transaction</a>
        </div>
        <div class="col-md-4 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Accounts</a></li>
                <li class="breadcrumb-item active">Journal Transaction</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-0">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-dark">Add Journal Transaction</h5>
                    </div>
                    <div class="card-body p-15">
                        <div class="basic-form">
                            <form action="{{ route('new-journal-transaction') }}" method="POST">
                                @csrf
                                <div class="row justify-content-md-center">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label"><span class="float-right text-right">Description</span></label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" name="description" required rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label"><span class="float-right text-right">Date</span></label>
                                            <div class="col-md-9">
                                                <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="manualJournalTable">
                                                <thead class="bg-primary">
                                                <tr>
                                                    <th class="text-dark text-center">Account</th>
                                                    <th class="text-dark text-center">Description</th>
                                                    <th class="text-dark text-center">Debit</th>
                                                    <th class="text-dark text-center">Credit</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr id="jt-1">
                                                    <td class="align-middle p-l-15 p-r-15">
                                                        <select class="form-control" name="transaction[0][account_code]">
                                                            <option> -- Select Account --- </option>
                                                            <optgroup label="Asset Account">
                                                                @foreach($assetAccounts as $assetAccount)
                                                                    <option value="{{ $assetAccount->account_code }}">{{ $assetAccount->account_name }}</option>
                                                                @endforeach
                                                            </optgroup>
                                                            <optgroup label="Liabilities Account">
                                                                @foreach($liabilitiesAccounts as $liabilitiesAccount)
                                                                    <option value="{{ $liabilitiesAccount->account_code }}">{{ $liabilitiesAccount->account_name }}</option>
                                                                @endforeach
                                                            </optgroup>
                                                            <optgroup label="Income Account">
                                                                @foreach($incomeAccounts as $incomeAccount)
                                                                    <option value="{{ $incomeAccount->account_code }}">{{ $incomeAccount->account_name }}</option>
                                                                @endforeach
                                                            </optgroup>
                                                            <optgroup label="Expense Account">
                                                                @foreach($expenseAccounts as $expenseAccount)
                                                                    <option value="{{ $expenseAccount->account_code }}">{{ $expenseAccount->account_name }}</option>
                                                                @endforeach
                                                            </optgroup>
                                                            <optgroup label="Owners Equity Account">
                                                                @foreach($ownersEquityAccounts as $ownersEquityAccount)
                                                                    <option value="{{ $ownersEquityAccount->account_code }}">{{ $ownersEquityAccount->account_name }}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        </select>
                                                    </td>
                                                    <td class="p-l-15 p-r-15 p-t-10 p-b-10"><textarea class="form-control" name="transaction[0][account_description]"></textarea></td>
                                                    <td class="align-middle p-l-15 p-r-15"><input type="text" name="transaction[0][debit]" class="form-control"/></td>
                                                    <td class="align-middle p-l-15 p-r-15"><input type="text" name="transaction[0][credit]" class="form-control"/></td>
                                                </tr>
                                                <tr id="jt-2">
                                                    <td class="align-middle p-l-15 p-r-15">
                                                        <select class="form-control" name="transaction[1][account_code]">
                                                            <option> -- Select Account --- </option>
                                                            <optgroup label="Asset Account">
                                                                @foreach($assetAccounts as $assetAccount)
                                                                    <option value="{{ $assetAccount->account_code }}">{{ $assetAccount->account_name }}</option>
                                                                @endforeach
                                                            </optgroup>
                                                            <optgroup label="Liabilities Account">
                                                                @foreach($liabilitiesAccounts as $liabilitiesAccount)
                                                                    <option value="{{ $liabilitiesAccount->account_code }}">{{ $liabilitiesAccount->account_name }}</option>
                                                                @endforeach
                                                            </optgroup>
                                                            <optgroup label="Income Account">
                                                                @foreach($incomeAccounts as $incomeAccount)
                                                                    <option value="{{ $incomeAccount->account_code }}">{{ $incomeAccount->account_name }}</option>
                                                                @endforeach
                                                            </optgroup>
                                                            <optgroup label="Expense Account">
                                                                @foreach($expenseAccounts as $expenseAccount)
                                                                    <option value="{{ $expenseAccount->account_code }}">{{ $expenseAccount->account_name }}</option>
                                                                @endforeach
                                                            </optgroup>
                                                            <optgroup label="Owners Equity Account">
                                                                @foreach($ownersEquityAccounts as $ownersEquityAccount)
                                                                    <option value="{{ $ownersEquityAccount->account_code }}">{{ $ownersEquityAccount->account_name }}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        </select>
                                                    </td>
                                                    <td class="p-l-15 p-r-15 p-t-10 p-b-10"><textarea class="form-control" name="transaction[1][account_description]"></textarea></td>
                                                    <td class="align-middle p-l-15 p-r-15"><input type="text" name="transaction[1][debit]" class="form-control" onkeyup="calculateTotalDebitAmount()"/></td>
                                                    <td class="align-middle p-l-15 p-r-15"><input type="text" name="transaction[1][credit]" class="form-control" onkeyup="calculateTotalCreditAmount()"/></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <a href="javascript:void(0)" id="addALine" class="btn btn-flat btn-primary m-t-15 m-b-15">Add A Line</a>
                                        <div class="col-md-6 offset-md-6 p-r-0">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>Total</th>
                                                        <td><input type="text" id="totalDebit" class="form-control" name="total_debit" value="0" readonly/></td>
                                                        <td><input type="text" id="totalCredit" class="form-control" name="total_crebit" value="0" readonly/></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="form-group p-t-15 m-b-0">
                                            <input type="submit" id="submitBtn" name="btn" value="Save" class="btn btn-flat btn-primary btn-block"/>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->

    <!-- End PAge Content -->
@endsection
