@extends('master')

@section('title', 'Transaction')

@section('body')
    <div class="row page-titles">
        <div class="col-md-3 align-self-center">
            <h3 class="text-primary">Accounts</h3>
        </div>
        <div class="col-md-5 text-center">
            <a href="javascript:void(0)" id="addIncomeBtn" class="btn btn-link">Add Income</a>
            <a href="javascript:void(0)" id="addExpenseBtn" class="btn btn-link">Add Expense</a>
        </div>
        <div class="col-md-4 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Accounts</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Transaction</a></li>
                <li class="breadcrumb-item active">Add Transaction</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Start Page Content -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card p-0">
                    <div class="card-body p-15">
                        <div class="basic-form">
                            <form id="newWrapperForTransaction">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /# column -->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="">
                            <div class="form-row m-b-15 p-0 m-0">
                                <div class="col-md col-sm-12">
                                    <select class="form-control" id="searchTransactionStatus" required>
                                        <option> --- Select Transaction Status ---</option>

                                        <option value="2">All</option>
                                        <option value="1">Verified</option>
                                        <option value="0">Not Verified</option>
                                    </select>
                                </div>
                                <div class="col-md col-sm-12">
                                    <select id="searchTransactionType" class="form-control">
                                        <option> --- Select Transaction Type ---</option>
                                        <option value="2">All</option>
                                        <option value="inc">Income</option>
                                        <option value="exp">Expense</option>
                                        <option value="inv">Invoice Payment</option>
                                        <option value="bill">Bill Payment</option>
                                    </select>
                                </div>
                                <div class="col-md col-sm-12">
                                    <select name="payment_type" id="incomeTransactionPaymentType"
                                            class="form-control">
                                        <option> --- Select Account Category ---</option>
                                        <optgroup label="Income Accounts" id="searchIncomeAccount">
                                            @foreach($incomeAccounts as $incomeAccount)
                                                <option value="{{ $incomeAccount->account_code }}">{{ $incomeAccount->account_name }}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Expense Accounts" id="searchExpenseAccount">
                                            @foreach($expenseAccounts as $expenseAccount)
                                                <option value="{{ $expenseAccount->account_code }}">{{ $expenseAccount->account_name }}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Owners Equity Accounts" id="searchOwnersEquityAccount">
                                            @foreach($ownersEquityAccounts as $ownersEquityAccount)
                                                <option value="{{ $ownersEquityAccount->account_code }}">{{ $ownersEquityAccount->account_name }}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Asset Accounts" id="searchAssetAccount">
                                            @foreach($assetAccounts as $assetAccount)
                                                <option value="{{ $assetAccount->account_code }}">{{ $assetAccount->account_name }}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Liabilities Accounts" id="searchLiabilitiesAccount">
                                            @foreach($liabilitiesAccounts as $liabilitiesAccount)
                                                <option value="{{ $liabilitiesAccount->account_code }}">{{ $liabilitiesAccount->account_name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-md col-sm-12">
                                    <select class="form-control" id="searchTransactionStatus" required>
                                        <option> --- Select Payment Account ---</option>

                                        @foreach($assetCashBankAccounts as $assetCashBankAccount)
                                            <option value="{{ $assetCashBankAccount->account_code }}">{{ $assetCashBankAccount->account_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row m-b-15 p-0 m-0">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">From Date</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="start_date" id="startDate"
                                                           class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">End Date</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="end_date" id="endDate"
                                                           class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="button" name="find" class="btn btn-flat btn-block btn-primary"
                                               id="find" value="Find"/>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table exportable table-bordered table-striped">
                                @if($message = Session::get('message'))
                                    <h5 class="text-center text-success">{{ $message }}</h5>
                                @endif
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Transaction Type</th>
                                    <th class="no-sort">Description</th>
                                    <th>Payment Amount</th>
                                    <th>Account Category</th>
                                    <th>Payment Account</th>
                                    <th class="no-sort no-export text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody id="outputResult">
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->transaction_date }}</td>
                                        <td>
                                            @if( substr($transaction->transaction_id, 0, 3) == 'inc' )
                                                Manual Income
                                            @elseif( substr($transaction->transaction_id, 0, 3) == 'exp' )
                                                Manual Expense
                                            @elseif( substr($transaction->transaction_id, 0, 3) == 'inv' )
                                                Invoice Transaction
                                            @elseif( substr($transaction->transaction_id, 0, 3) == 'bil' )
                                                Bill Transaction
                                            @elseif(substr($transaction->transaction_id, 0, 3) == 'pav')
                                                Payment Voucher Transaction
                                            @elseif(substr($transaction->transaction_id, 0, 3) == 'crv')
                                                Credit Voucher Transaction
                                            @elseif(substr($transaction->transaction_id, 0, 3) == 'jav')
                                                Journal Voucher Transaction
                                            @endif
                                        </td>
                                        <td>{{ $transaction->payment_description }}</td>
                                        <td<?php if (substr($transaction->transaction_id, 0, 3) == 'inc' ||
                                                     substr($transaction->transaction_id, 0, 3) == 'inv') { ?>
                                                class = "text-success"
                                        <?php } else { ?>
                                        class = "text-danger"
                                        <?php } ?>
                                        >{{ $transaction->payment_amount }}</td>
                                        <td>{{ $transaction->account_category }}</td>
                                        <td>{{ $transaction->account_name }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                @if($transaction->verification_status == 0)
                                                    <a href="javascript:void(0)" title="Verify"
                                                       id="{{ $transaction->id }}"
                                                       class="btn btn-warning btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2 verified-transaction"><i
                                                                class="fa fa-12 fa-comment-o"></i></a>
                                                @else
                                                    <a href="javascript:void(0)" title="Verify"
                                                       id="{{ $transaction->id }}"
                                                       class="btn btn-warning btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2 not-verified-transaction"><i
                                                                class="fa fa-12 fa-comment"></i></a>
                                                @endif
                                                <a href="javascript:void(0)" title="Edit" id="{{ $transaction->id }}"
                                                   class="btn btn-info btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2 edit-transaction"><i
                                                            class="fa fa-12 fa-edit"></i></a>
                                                <a href="javascript:void(0)" title="Delete"
                                                   class="btn btn-danger btn-rounded btn-xs p-l-10 p-r-10 p-t-3 p-b-1 m-l-2 m-r-2 "><i
                                                            class="fa fa-12 fa-trash-o"></i></a>
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

    <!-- Edit Transaction Modal -->
    <div class="modal" id="editTransactionModal" tabindex="-1" role="dialog" aria-labelledby="editTransactionModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-90" role="document">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <button type="button" class="close m-r-0 p-t-5 p-b-25"
                            onclick="closeModal('#editTransactionModal')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-15">
                    <div class="basic-form">
                        <form action="{{ route('update-transaction') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Transaction Date</span></label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" name="transaction_date"
                                           id="editTransactionDate" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Account Category</span></label>
                                <div class="col-md-9">
                                    <select class="form-control" name="account_category"
                                            id="editTransactionAccountCategory" required>
                                        <option> --- Select Account Category ---</option>
                                        <optgroup label="Income Accounts" id="incomeAccount">
                                            @foreach($incomeAccounts as $incomeAccount)
                                                <option value="{{ $incomeAccount->account_code }}">{{ $incomeAccount->account_name }}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Expense Accounts" id="expenseAccount">
                                            @foreach($expenseAccounts as $expenseAccount)
                                                <option value="{{ $expenseAccount->account_code }}">{{ $expenseAccount->account_name }}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Owners Equity Accounts" id="ownersEquityAccount">
                                            @foreach($ownersEquityAccounts as $ownersEquityAccount)
                                                <option value="{{ $ownersEquityAccount->account_code }}">{{ $ownersEquityAccount->account_name }}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Asset Accounts" id="assetAccount">
                                            @foreach($assetAccounts as $assetAccount)
                                                <option value="{{ $assetAccount->account_code }}">{{ $assetAccount->account_name }}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Liabilities Accounts" id="liabilitiesAccount">
                                            @foreach($liabilitiesAccounts as $liabilitiesAccount)
                                                <option value="{{ $liabilitiesAccount->account_code }}">{{ $liabilitiesAccount->account_name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Payment Account</span></label>
                                <div class="col-md-9">
                                    <select name="payment_account" id="editTransactionPaymentAccount"
                                            class="form-control">
                                        <option> --- Select Payment Account ---</option>
                                        @foreach($assetCashBankAccounts as $assetCashBankAccount)
                                            <option value="{{ $assetCashBankAccount->account_code }}">{{ $assetCashBankAccount->account_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Transaction Description</span></label>
                                <div class="col-md-9">
                                    <textarea name="transaction_description" required id="editTransactionDescription"
                                              class="form-control" rows="4"
                                              placeholder="Add a description..."></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span
                                            class="float-right text-right">Payment Type</span></label>
                                <div class="col-md-9">
                                    <select name="payment_type" id="editTransactionPaymentType" class="form-control">
                                        <option> --- Select Payment Method ---</option>
                                        <option value="Bank Payment">Bank Payment</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Check">Check</option>
                                        <option value="Credit Cart">Credit Cart</option>
                                        <option value="Paypal">Paypal</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Transaction Amount</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="transaction_amount"
                                           id="editTransactionAmount" size="16" placeholder="Enter Amount" required>
                                    <input type="hidden" name="transaction_id" id="editTransactionId"/>
                                    <input type="hidden" name="journal_id" id="editJournalId"/>
                                </div>
                            </div>
                            <div class="form-group row m-0 p-0">
                                <label for="" class="col-md-3 col-form label"></label>
                                <div class="col-md-9 p-l-10 p-r-0">
                                    <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary"
                                           value="Update Transaction Info">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
