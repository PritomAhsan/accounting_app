@extends('master')

@section('title', 'Account Transactions')

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Account Transactions</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Reports</a></li>
                <li class="breadcrumb-item active">Account Transactions</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-0">
                    <div class="card-body p-20">
                        <div class="row">
                            <div class="col-lg-11">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <select class="form-control" id="transactionAccountCode">
                                                <option value=""> -- Select Account -- </option>
                                                <optgroup label="Income Accounts" id="transactionIncomeAccount">
                                                    @foreach($incomeAccounts as $incomeAccount)
                                                    <option value="{{ $incomeAccount->account_code }}">{{ $incomeAccount->account_name }}</option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Expense Accounts" id="transactionExpenseAccount">
                                                    @foreach($expenseAccounts as $expenseAccount)
                                                    <option value="{{ $expenseAccount->account_code }}">{{ $expenseAccount->account_name }}</option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Owners Equity Accounts" id="transactionOwnersEquityAccount">
                                                    @foreach($ownersEquityAccounts as $ownersEquityAccount)
                                                    <option value="{{ $ownersEquityAccount->account_code }}">{{ $ownersEquityAccount->account_name }}</option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Asset Accounts" id="transactionAssetAccount">
                                                    @foreach($assetAccounts as $assetAccount)
                                                    <option value="{{ $assetAccount->account_code }}">{{ $assetAccount->account_name }}</option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Liabilities Accounts" id="transactionLiabilitiesAccount">
                                                    @foreach($liabilitiesAccounts as $liabilitiesAccount)
                                                    <option value="{{ $liabilitiesAccount->account_code }}">{{ $liabilitiesAccount->account_name }}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 text-right m-t-7">From</label>
                                            <div class="col-md-9">
                                                <input type="date" name="start_date" id="transactionsStartDate" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 text-right m-t-7">To</label>
                                            <div class="col-md-9">
                                                <input type="date" name="end_date" id="transactionsEndDate" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-group">
                                    <a href="" class="btn btn-flat btn-block btn-primary" id="singleTransactionBtn">GO</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card p-0">
                    <div class="card-body p-20">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group" id="singleTransactionWrapper">
                                            <div class="text-center">
                                                <h3 id="reportAccountName"></h3>
                                                <h4>bitBirds Solutions</h4>
                                                <h4 id="reportDate">Form 05 MArch, 2014 to 21 June 2018</h4>
                                                <h5>Created 21 June, 2018</h5>
                                            </div>
                                            <br/>

                                            <div class="table-responsive">
                                                <table class="table exportable table-bordered table-striped">
                                                    <thead class="bg-primary">
                                                    <tr>
                                                        <th class="text-white">Date</th>
                                                        <th class="text-white">Transaction Description</th>
                                                        <th class="text-white">Debit</th>
                                                        <th class="text-white">Credit</th>
                                                        <th class="text-white" id="balance">Balance</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="transactionsTbody">
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End PAge Content -->
    </div>
@endsection
