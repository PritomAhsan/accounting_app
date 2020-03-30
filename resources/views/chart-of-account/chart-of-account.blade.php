@extends('master')

@section('title', 'Chart of Account')

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Accounts</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Accounts</a></li>
                <li class="breadcrumb-item active">Chart of Account</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-b-0">
                    <div class="card-body p-b-0">
                        <div class="tab-page-refresh">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs customtab2" role="tablist" id="chart-of-account-tab">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#assets" role="tab"><span
                                                class="hidden-sm-up"><i class="ti-home"></i></span> <span
                                                class="hidden-xs-down">Assets</span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#liabilities"
                                                        role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span>
                                        <span class="hidden-xs-down">Liabilities</span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#owners-equity" role="tab"><span
                                                class="hidden-sm-up"><i class="ti-email"></i></span> <span
                                                class="hidden-xs-down">Owners Equity</span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#income" role="tab"><span
                                                class="hidden-sm-up"><i class="ti-email"></i></span> <span
                                                class="hidden-xs-down">Income</span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#expense" role="tab"><span
                                                class="hidden-sm-up"><i class="ti-email"></i></span> <span
                                                class="hidden-xs-down">Expense</span></a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content" id="chart-of-account-tab-content">
                                <div class="tab-pane active" id="assets" role="tabpanel">
                                    @foreach($assets as $asset)
                                        <div class="card p-0">
                                            <div class="card-header bg-primary">
                                                <h5 class="card-title text-dark">{{ $asset->asset_name }}</h5>
                                            </div>
                                            <div class="card-body p-l-15 p-r-15">
                                                @foreach($subAssets as $subAsset)
                                                    @if($asset->id == $subAsset->asset_id)
                                                        <div class="card p-0">
                                                            <div class="card-header bg-primary">
                                                                <h5 class="card-title text-dark">{{ $subAsset->sub_asset_name }}</h5>
                                                            </div>
                                                            <div class="card-body p-l-15 p-r-15">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-striped m-t-15">
                                                                        <tbody>
                                                                        @foreach($assetsAccounts as $assetsAccount)
                                                                            @if($asset->id == $assetsAccount->asset_id && $subAsset->id == $assetsAccount->sub_asset_id)
                                                                                <tr>
                                                                                    <td contenteditable="true"
                                                                                        id="assetAccountName{{ $assetsAccount->id }}"
                                                                                        onblur="assetAccountNameUpdate('{{ $assetsAccount->id }}');">{{ $assetsAccount->account_name }}</td>
                                                                                    <td>{{ $assetsAccount->account_code }}</td>
                                                                                    <td contenteditable="true"
                                                                                        id="assetAccountDescription{{ $assetsAccount->id }}"
                                                                                        onblur="assetAccountDescriptionUpdate('{{ $assetsAccount->id }}');">{{ $assetsAccount->account_description }}</td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="row justify-content-center m-t-15 m-b-5">
                                                                    <div class="col-md-10">
                                                                        <form class="form-row"
                                                                              action="{{ route('new-asset-account') }}"
                                                                              method="POST">
                                                                            @csrf
                                                                            <div class="col-md-3">
                                                                                <input type="text" id="{{ $subAsset->id }}"
                                                                                       class="form-control asset-account-name"
                                                                                       name="account_name"
                                                                                       placeholder="Account Name">
                                                                                <input type="hidden" name="asset_id"
                                                                                       id="assetId"
                                                                                       value="{{ $asset->id }}"/>
                                                                                <input type="hidden" name="sub_asset_id"
                                                                                       id="subAssetId"
                                                                                       value="{{ $subAsset->id }}"/>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <input type="text"
                                                                                       id="assetAccountCode{{ $subAsset->id }}"
                                                                                       class="form-control"
                                                                                       name="account_code" readonly
                                                                                       placeholder="Account Code"/>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <input type="text" class="form-control"
                                                                                       name="account_description"
                                                                                       id="assetAccountDescription"
                                                                                       placeholder="Account Description"/>
                                                                            </div>
                                                                            <div class="col-md-3 mb-2">
                                                                                <button type="submit"
                                                                                        class="btn btn-flat btn-block btn-primary">
                                                                                    Create Account
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="tab-pane" id="liabilities" role="tabpanel">
                                    @foreach($liabilities as $liabilitie)
                                        <div class="card p-0">
                                            <div class="card-header bg-primary">
                                                <h5 class="card-title text-dark">{{ $liabilitie->liabilitie_name  }}</h5>
                                            </div>
                                            <div class="card-body p-l-15 p-r-15">
                                                @foreach($subLiabilities as $subLiabilitie)
                                                    @if($liabilitie->id == $subLiabilitie->liabilitie_id)
                                                        <div class="card p-0">
                                                            <div class="card-header bg-primary">
                                                                <h5 class="card-title text-dark">{{ $subLiabilitie->sub_liabilitie_name }}</h5>
                                                            </div>
                                                            <div class="card-body p-l-15 p-r-15">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-striped m-t-15">
                                                                        <tbody>
                                                                        @foreach($liabilitieAccounts as $liabilitieAccount)
                                                                            @if($liabilitie->id == $liabilitieAccount->liabilitie_id && $subLiabilitie->id == $liabilitieAccount->sub_liabilitie_id)
                                                                                <tr>
                                                                                    <td contenteditable="true" id="liabilitieAccountName{{ $liabilitieAccount->id }}" onblur="liabilitieAccountNameUpdate('{{ $liabilitieAccount->id }}');">{{ $liabilitieAccount->account_name }}</td>
                                                                                    <td>{{ $liabilitieAccount->account_code }}</td>
                                                                                    <td contenteditable="true" id="liabilitieAccountDescription{{ $liabilitieAccount->id }}" onblur="liabilitieAccountDescriptionUpdate('{{ $liabilitieAccount->id }}');">{{ $liabilitieAccount->account_description }}</td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="row justify-content-center m-t-15 m-b-5">
                                                                    <div class="col-md-10">
                                                                        <form class="form-row" action="{{ route('new-liabilitie-account') }}" method="POST">
                                                                            @csrf
                                                                            <div class="col-md-3">
                                                                                <input type="text"
                                                                                       class="form-control liabilitie-account-name"
                                                                                       name="account_name" id="{{ $subLiabilitie->id }}"
                                                                                       placeholder="Account Name">
                                                                                <input type="hidden"
                                                                                       name="liabilitie_id" id="liabilitieId"
                                                                                       value="{{ $liabilitie->id }}"/>
                                                                                <input type="hidden"
                                                                                       name="sub_liabilitie_id"
                                                                                       id="subLiabilitieId" value="{{ $subLiabilitie->id }}"/>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <input type="text" class="form-control"
                                                                                       name="account_code" readonly
                                                                                       id="liabilitieAccountCode{{ $subLiabilitie->id }}"
                                                                                       placeholder="Account Code"/>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <input type="text" class="form-control"
                                                                                       name="account_description"
                                                                                       id="accountDescription"
                                                                                       placeholder="Account Description"/>
                                                                            </div>
                                                                            <div class="col-md-3 mb-2">
                                                                                <button type="submit"
                                                                                        class="btn btn-flat btn-block btn-primary">
                                                                                    Create Account
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="tab-pane" id="owners-equity" role="tabpanel">
                                    @foreach($ownersEquities as $ownersEquity)
                                        <div class="card p-0">
                                            <div class="card-header bg-primary">
                                                <h5 class="card-title text-dark">{{ $ownersEquity->owners_equity_name  }}</h5>
                                            </div>
                                            <div class="card-body p-l-15 p-r-15">
                                                <div class="card p-0">
                                                    @foreach($subOwnersEquities as $subOwnersEquity)
                                                        @if($ownersEquity->id == $subOwnersEquity->owners_equity_id)
                                                            <div class="card-header bg-primary">
                                                                <h5 class="card-title text-dark">{{ $subOwnersEquity->sub_owners_equity_name }}</h5>
                                                            </div>
                                                            <div class="card-body p-l-15 p-r-15">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-striped m-t-15">
                                                                        <tbody>
                                                                        @foreach($ownersEquityAccounts as $ownersEquityAccount)
                                                                            @if($ownersEquity->id == $ownersEquityAccount->owners_equity_id && $subOwnersEquity->id == $ownersEquityAccount->sub_owners_equity_id)
                                                                                <tr>
                                                                                    <td contenteditable="true" id="ownersEquityAccountName{{ $ownersEquityAccount->id }}" onblur="ownersEquityAccountNameUpdate('{{ $ownersEquityAccount->id }}');">{{ $ownersEquityAccount->account_name }}</td>
                                                                                    <td>{{ $ownersEquityAccount->account_code }}</td>
                                                                                    <td contenteditable="true" id="ownersEquityAccountDescription{{ $ownersEquityAccount->id }}" onblur="ownersEquityAccountDescriptionUpdate('{{ $ownersEquityAccount->id }}');">{{ $ownersEquityAccount->account_description }}</td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="row justify-content-center m-t-15 m-b-5">
                                                                    <div class="col-md-10">
                                                                        <form class="form-row" action="{{ route('new-owners-equity-account') }}" method="POST">
                                                                            @csrf
                                                                            <div class="col-md-3">
                                                                                <input type="text"
                                                                                       class="form-control owners-equity-account-name"
                                                                                       name="account_name"
                                                                                       id="{{ $subOwnersEquity->id }}"
                                                                                       placeholder="Account Name">
                                                                                <input type="hidden"
                                                                                       name="owners_equity_id"
                                                                                       id="ownersEquityId" value="{{ $ownersEquity->id }}"/>
                                                                                <input type="hidden"
                                                                                       name="sub_owners_equity_id"
                                                                                       id="subOwnersEquityId" value="{{ $subOwnersEquity->id }}"/>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <input type="text" class="form-control"
                                                                                       name="account_code" readonly
                                                                                       id="ownersEquityAccountCode{{ $subOwnersEquity->id }}"/>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <input type="text" class="form-control"
                                                                                       name="account_description"
                                                                                       id="ownersEquityAccountDescription"
                                                                                       placeholder="Account Description"/>
                                                                            </div>
                                                                            <div class="col-md-3 mb-2">
                                                                                <button type="submit"
                                                                                        class="btn btn-flat btn-block btn-primary">
                                                                                    Create Account
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="tab-pane" id="income" role="tabpanel">
                                    <div class="card p-0">
                                        @foreach($incomes as $income)
                                            <div class="card-header bg-primary">
                                                <h5 class="card-title text-dark">{{ $income->income_name  }}</h5>
                                            </div>
                                            <div class="card-body p-l-15 p-r-15">
                                                @foreach($subIncomes as $subIncome)
                                                    @if($income->id == $subIncome->income_id)
                                                        <div class="card p-0">
                                                            <div class="card-header bg-primary">
                                                                <h5 class="card-title text-dark">{{ $subIncome->sub_income_name }}</h5>
                                                            </div>
                                                            <div class="card-body p-l-15 p-r-15">
                                                                <table class="table table-bordered table-striped m-t-15">
                                                                    <tbody>
                                                                    @foreach($incomeAccounts as $incomeAccount)
                                                                        @if($income->id == $incomeAccount->income_id && $subIncome->id == $incomeAccount->sub_income_id)
                                                                            <tr>
                                                                                <td contenteditable="true" id="incomeAccountName{{ $incomeAccount->id }}" onblur="incomeAccountNameUpdate('{{ $incomeAccount->id }}');">{{ $incomeAccount->account_name }}</td>
                                                                                <td>{{ $incomeAccount->account_code }}</td>
                                                                                <td contenteditable="true" id="incomeAccountDescription{{ $incomeAccount->id }}" onblur="incomeAccountDescriptionUpdate('{{ $incomeAccount->id }}');">{{ $incomeAccount->account_description }}</td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                                <div class="row justify-content-center m-t-15 m-b-5">
                                                                    <div class="col-md-10">
                                                                        <form class="form-row" action="{{ route('new-income-account') }}" method="POST">
                                                                            @csrf
                                                                            <div class="col-md-3">
                                                                                <input type="text"
                                                                                       class="form-control income-account-name"
                                                                                       name="account_name"
                                                                                       id="{{ $subIncome->id }}"
                                                                                       placeholder="Account Name">
                                                                                <input type="hidden"
                                                                                       name="income_id" id="incomeId" value="{{ $income->id }}"/>
                                                                                <input type="hidden"
                                                                                       name="sub_income_id" id="subIncomeId"
                                                                                       value="{{ $subIncome->id }}"/>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <input type="text" class="form-control"
                                                                                       name="account_code" readonly
                                                                                       id="incomeAccountCode{{ $subIncome->id }}"/>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <input type="text" class="form-control"
                                                                                       name="account_description"
                                                                                       id="incomeAccountDescription"
                                                                                       placeholder="Account Description"/>
                                                                            </div>
                                                                            <div class="col-md-3 mb-2">
                                                                                <button type="submit"
                                                                                        class="btn btn-flat btn-block btn-primary">
                                                                                    Create Account
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane" id="expense" role="tabpanel">
                                    @foreach($expenses as $expense)
                                        <div class="card p-0">
                                            <div class="card-header bg-primary">
                                                <h5 class="card-title text-dark">{{ $expense->expense_name  }}</h5>
                                            </div>
                                            <div class="card-body p-l-15 p-r-15">
                                                @foreach($subExpenses as $subExpense)
                                                    @if($expense->id == $subExpense->expense_id)
                                                        <div class="card p-0">
                                                            <div class="card-header bg-primary">
                                                                <h5 class="card-title text-dark">{{ $subExpense->sub_expense_name }}</h5>
                                                            </div>
                                                            <div class="card-body p-l-15 p-r-15">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-striped m-t-15">
                                                                        <tbody>
                                                                        @foreach($expenseAccounts as $expenseAccount)
                                                                            @if($expense->id == $expenseAccount->expense_id && $subExpense->id == $expenseAccount->sub_expense_id)
                                                                                <tr>
                                                                                    <td contenteditable="true" id="expenseAccountName{{ $expenseAccount->id }}" onblur="expenseAccountNameUpdate('{{ $expenseAccount->id }}');">{{ $expenseAccount->account_name }}</td>
                                                                                    <td>{{ $expenseAccount->account_code }}</td>
                                                                                    <td contenteditable="true" id="expenseAccountDescription{{ $expenseAccount->id }}" onblur="expenseAccountDescriptionUpdate('{{ $expenseAccount->id }}');">{{ $expenseAccount->account_description }}</td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="row justify-content-center m-t-15 m-b-5">
                                                                    <div class="col-md-10">
                                                                        <form class="form-row" action="{{ route('new-expense-account') }}" method="POST">
                                                                            @csrf
                                                                            <div class="col-md-3">
                                                                                <input type="text"
                                                                                       class="form-control expense-account-name"
                                                                                       name="account_name" id="{{ $subExpense->id }}"
                                                                                       placeholder="Account Name">
                                                                                <input type="hidden" class="form-control"
                                                                                       name="expense_id" id="expenseId"
                                                                                       value="{{ $expense->id }}"/>
                                                                                <input type="hidden" class="form-control"
                                                                                       name="sub_expense_id" id="subExpenseId"
                                                                                       value="{{ $subExpense->id }}"/>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <input type="text" class="form-control"
                                                                                       name="account_code" readonly
                                                                                       id="expenseAccountCode{{ $subExpense->id }}"/>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <input type="text" class="form-control"
                                                                                       name="account_description"
                                                                                       id="expenseAccountDescription"
                                                                                       placeholder="Account Description"/>
                                                                            </div>
                                                                            <div class="col-md-3 mb-2">
                                                                                <button type="submit"
                                                                                        class="btn btn-flat btn-block btn-primary">
                                                                                    Create Account
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- /# column -->
        </div>
        <!-- /# row -->

        <!-- End PAge Content -->
    {{--<script>
        console.log(localStorage.chartOfAccountHash);
    </script>--}}
@endsection
