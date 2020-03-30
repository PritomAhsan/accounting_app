@extends('master')

@section('title', 'Edit Journal Transaction')

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
                        <h5 class="card-title text-white">Edit Journal Transaction</h5>
                    </div>
                    <div class="card-body p-15">
                        <div class="basic-form">
                            <form action="{{ route('update-journal-transaction') }}" method="POST" name="editManualJournalForm">
                                @csrf
                                <div class="row justify-content-md-center">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label"><span class="float-right text-right">Description</span></label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" name="description" required rows="3">{{ $manualJournal->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label"><span class="float-right text-right">Date</span></label>
                                            <div class="col-md-9">
                                                <input type="date" name="date" class="form-control" value="{{ $manualJournal->date }}" required>
                                                <input type="hidden" value="{{ $manualJournal->id }}" name="manual_journal_id" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="manualJournalTable">
                                                <thead class="bg-primary">
                                                <tr>
                                                    <th class="text-white text-center">Account</th>
                                                    <th class="text-white text-center">Description</th>
                                                    <th class="text-white text-center">Debit</th>
                                                    <th class="text-white text-center">Credit</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php($index=0)
                                                @foreach($journalRecords as $journalRecord)
                                                    <tr id="jt-{{ $index }}">
                                                        <td class="align-middle p-l-15 p-r-15">
                                                            <select class="form-control" name="transaction[{{ $index }}][account_code]">
                                                                <option> -- Select Account --- </option>
                                                                <optgroup label="Asset Account">
                                                                    @foreach($assetAccounts as $assetAccount)
                                                                        <option value="{{ $assetAccount->account_code }}"  {{ $journalRecord->account_code == $assetAccount->account_code ? 'selected' : '' }}>{{ $assetAccount->account_name }}</option>
                                                                    @endforeach
                                                                </optgroup>
                                                                <optgroup label="Liabilities Account">
                                                                    @foreach($liabilitiesAccounts as $liabilitiesAccount)
                                                                        <option value="{{ $liabilitiesAccount->account_code }}" {{ $journalRecord->account_code == $liabilitiesAccount->account_code ? 'selected' : '' }}>{{ $liabilitiesAccount->account_name }}</option>
                                                                    @endforeach
                                                                </optgroup>
                                                                <optgroup label="Income Account">
                                                                    @foreach($incomeAccounts as $incomeAccount)
                                                                        <option value="{{ $incomeAccount->account_code }}" {{ $journalRecord->account_code == $incomeAccount->account_code ? 'selected' : '' }}>{{ $incomeAccount->account_name }}</option>
                                                                    @endforeach
                                                                </optgroup>
                                                                <optgroup label="Expense Account">
                                                                    @foreach($expenseAccounts as $expenseAccount)
                                                                        <option value="{{ $expenseAccount->account_code }}" {{ $journalRecord->account_code == $expenseAccount->account_code ? 'selected' : '' }}>{{ $expenseAccount->account_name }}</option>
                                                                    @endforeach
                                                                </optgroup>
                                                                <optgroup label="Owners Equity Account">
                                                                    @foreach($ownersEquityAccounts as $ownersEquityAccount)
                                                                        <option value="{{ $ownersEquityAccount->account_code }}" {{ $journalRecord->account_code == $ownersEquityAccount->account_code ? 'selected' : '' }}>{{ $ownersEquityAccount->account_name }}</option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                        </td>
                                                        <td class="p-l-15 p-r-15 p-t-10 p-b-10"><textarea class="form-control" name="transaction[{{ $index }}][account_description]">{{ $journalRecord->description }}</textarea></td>
                                                        <td class="align-middle p-l-15 p-r-15"><input type="text" name="transaction[{{ $index }}][debit]" class="form-control" value="{{ $journalRecord->debit }}" onkeyup="calculateTotalDebitAmount()"/></td>
                                                        <td class="align-middle p-l-15 p-r-15"><input type="text" name="transaction[{{ $index }}][credit]" class="form-control" value="{{ $journalRecord->credit }}" onkeyup="calculateTotalCreditAmount()"/></td>
                                                    </tr>
                                                    @php($index++)
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <a href="javascript:void(0)" id="{{ $index }}" class="btn btn-flat btn-primary m-t-15 m-b-15 edit-journal">Add A Line</a>
                                        <div class="col-md-6 offset-md-6 p-r-0">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>Total</th>
                                                        <td><input type="text" class="form-control" id="totalDebit" name="total_debit" value="{{ $manualJournal->debit }}" readonly/></td>
                                                        <td><input type="text" class="form-control" id="totalCredit" name="total_crebit" value="{{ $manualJournal->credit }}" readonly/></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="form-group p-t-15 m-b-0">
                                            <input type="submit" id="submitBtn" name="btn" value="Update" class="btn btn-flat btn-primary btn-block"/>
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
