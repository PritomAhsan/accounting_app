@extends('master')

@section('title', 'Balance Sheet')

@section('body')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Balance Sheet</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Reports</a></li>
                <li class="breadcrumb-item active">Balance Sheet</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row p-t-15">
            <div class="col-md-6"><strong>Account</strong></div>
            <div class="col-md-6"><span class="float-right">{{ date('Y-m-d') }}</span></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-0">
                    <div class="card-header bg-dark">
                        <h5 class="card-title text-white">Asset</h5>
                    </div>
                    <div class="card-body p-l-20 p-r-20 p-b-20">
                        <div id="assetAccordion">
                            @php($totalAsset = 0)
                            @foreach($assetData as $asset)
                                @php($sum = 0)
                                @foreach($assetAccounts as $value)
                                    @if($value['asset_id'] == $asset['id'])
                                        @php($sum += $value['balance'])
                                    @endif
                                @endforeach
                            <div class="card p-0">
                                <div class="card-header bg-primary p-0" id="assetHeading{{ $asset['id'] }}">
                                    <button class="btn btn-link btn-block text-dark" data-toggle="collapse" data-target="#assetCollapse{{ $asset['id'] }}" aria-expanded="false" aria-controls="assetCollapse{{ $asset['id'] }}">
                                        <span class="float-left text-dark">Total {{ $asset['asset_name'] }}</span>
                                        <span class="float-right text-dark">Tk. {{ number_format($sum, 2) }}</span>
                                    </button>
                                </div>

                                <div id="assetCollapse{{ $asset['id'] }}" class="collapse" aria-labelledby="assetHeading{{ $asset['id'] }}" data-parent="#assetAccordion">
                                    <div class="card-body p-l-20 p-r-20">

                                        <div id="subAssetAccordion{{ $asset['id'] }}">
                                            @foreach($subAssetData as $subAsset)
                                                @if($subAsset['asset_id'] == $asset['id'])
                                                    @php($assetSum = 0)
                                                    @foreach($assetAccounts as $value)
                                                        @if($value['asset_id'] == $asset['id'] && $value['acc_id'] == $subAsset['id'])
                                                            @php($assetSum += $value['balance'])
                                                        @endif
                                                    @endforeach
                                                    <div class="card p-0">
                                                        <div class="card-header bg-primary p-0" id="subAssetHeading{{ $subAsset['id'] }}">
                                                            <button class="btn btn-link btn-block text-dark" data-toggle="collapse" data-target="#subAssetCollapse{{ $subAsset['id'] }}" aria-expanded="false" aria-controls="subAssetCollapse{{ $subAsset['id'] }}">
                                                                <span class="float-left">{{ $subAsset['sub_asset_name'] }}</span>
                                                                <span class="float-right">Tk. {{ number_format($assetSum, 2) }}</span>
                                                            </button>
                                                        </div>
                                                        <div id="subAssetCollapse{{ $subAsset['id'] }}" class="collapse" aria-labelledby="subAssetHeading{{ $subAsset['id'] }}" data-parent="#subAssetAccordion{{ $asset['id'] }}">
                                                            <div class="card-body p-20">
                                                                <div class="table-responsive">
                                                                    <table class="table" style="margin-bottom: 0px;">
                                                                        @php($assetSum = 0)
                                                                        @foreach($assetAccounts as $value)
                                                                            @if($value['asset_id'] == $asset['id'] && $value['acc_id'] == $subAsset['id'])
                                                                                <tr>
                                                                                    <th class="text-left">{{ $value['acc_name'] }}</th>
                                                                                    <td class="text-right">{{ number_format($value['balance'],2) }}</td>
                                                                                </tr>
                                                                                @php($assetSum += $value['balance'])
                                                                            @endif
                                                                        @endforeach
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @php($totalAsset += $sum)
                            @endforeach
                        </div>
                        <div class="container">
                            <div class="row bg-info p-t-10 p-b-10 m-t-15">
                                <div class="col-md-6"><strong class="float-left text-dark">Total Asset</strong></div>
                                <div class="col-md-6"><strong class="float-right text-dark">Tk. {{ number_format($totalAsset,2) }}</strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card p-0">
                    <div class="card-header bg-dark">
                        <h5 class="card-title text-white">Liabilities</h5>
                    </div>
                    <div class="card-body p-l-20 p-r-20 p-b-20">
                        <div id="liabilitieAccordion">
                            @php($totalLiabilities = 0)
                            @foreach($liabilitieData as $liabilitie)
                                @php($sum = 0)
                                @foreach($liabilitiesAccounts as $value)
                                    @if($value['liabilitie_id'] == $liabilitie['id'])
                                        @php($sum += $value['balance'])
                                    @endif
                                @endforeach
                                <div class="card p-0">
                                    <div class="card-header bg-primary p-0" id="liabilitieHeading{{ $liabilitie['id'] }}">
                                        <button class="btn btn-link btn-block text-dark" data-toggle="collapse" data-target="#liabilitieCollapse{{ $liabilitie['id'] }}" aria-expanded="false" aria-controls="liabilitieCollapse{{ $liabilitie['id'] }}">
                                            <span class="float-left text-dark">Total {{ $liabilitie['liabilitie_name'] }}</span>
                                            <span class="float-right text-dark">Tk. {{ number_format($sum,2) }}</span>
                                        </button>
                                    </div>
                                    <div id="liabilitieCollapse{{ $liabilitie['id'] }}" class="collapse" aria-labelledby="liabilitieHeading{{ $liabilitie['id'] }}" data-parent="#liabilitieAccordion">
                                    <div class="card-body p-l-20 p-r-20">
                                        <div id="subLiabilitieAccordion{{ $liabilitie['id'] }}">
                                            @foreach($subLiabilitiesData as $subLiabilities)
                                                @if($subLiabilities['liabilitie_id'] == $liabilitie['id'])
                                                    @php($liabilitieSum = 0)
                                                    @foreach($liabilitiesAccounts as $value)
                                                        @if($value['liabilitie_id'] == $liabilitie['id'] && $value['sub_liabilitie_id'] == $subLiabilities['id'])
                                                            @php($liabilitieSum += $value['balance'])
                                                        @endif
                                                    @endforeach
                                                    <div class="card p-0">
                                                        <div class="card-header bg-primary p-0" id="subLiabilitieHeading{{ $subLiabilities['id'] }}">
                                                            <button class="btn btn-link btn-block text-dark" data-toggle="collapse" data-target="#subLiabilitieCollapse{{ $subLiabilities['id'] }}" aria-expanded="false" aria-controls="subLiabilitieCollapse{{ $subLiabilities['id'] }}">
                                                                <span class="float-left text-dark">Total {{ $subLiabilities['sub_liabilitie_name'] }}</span>
                                                                <span class="float-right text-dark">Tk. {{ number_format($liabilitieSum,2) }}</span>
                                                            </button>
                                                        </div>

                                                        <div id="subLiabilitieCollapse{{ $subLiabilities['id'] }}" class="collapse" aria-labelledby="subLiabilitieHeading{{ $subLiabilities['id'] }}" data-parent="#subLiabilitieAccordion{{ $liabilitie['id'] }}">
                                                            <div class="card-body p-20">
                                                                <div class="table-responsive">
                                                                    <table class="table" style="margin-bottom: 0px;">
                                                                        @foreach($liabilitiesAccounts as $value)
                                                                            @if($value['liabilitie_id'] == $liabilitie['id'] && $value['sub_liabilitie_id'] == $subLiabilities['id'])
                                                                                <tr>
                                                                                    <th class="text-left">{{ $value['acc_name'] }}</th>
                                                                                    <td class="text-right">{{ number_format($value['balance'],2) }}</td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                </div>
                                @php($totalLiabilities +=$sum )
                            @endforeach
                        </div>
                        <div class="container">
                            <div class="row bg-info p-t-10 p-b-10 m-t-15">
                                <div class="col-md-6"><strong class="float-left text-dark">Total Liability</strong></div>
                                <div class="col-md-6"><strong class="float-right text-dark">Tk. {{ number_format($totalLiabilities,2) }}</strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card p-0">
                    <div class="card-header bg-dark">
                        <h5 class="card-title text-white">Equity</h5>
                    </div>
                    <div class="card-body p-l-20 p-r-20 p-b-20">
                        <div id="ownersEquityAccordion">
                            @php($totalEquity = 0)
                            @foreach($ownersEquityData as $ownersEquity)
                                @php($sum = 0)
                                @foreach($ownersEquityAccounts as $value)
                                    @if($value['owners_equity_id'] == $ownersEquity['id'])
                                        @php($sum += $value['balance'])
                                    @endif
                                @endforeach
                                <div class="card p-0">
                                    <div class="card-header bg-primary p-0" id="ownersEquityHeading{{ $ownersEquity['id'] }}">
                                        <button class="btn btn-link btn-block text-dark" data-toggle="collapse" data-target="#ownersEquityCollapse{{ $ownersEquity['id'] }}" aria-expanded="false" aria-controls="ownersEquityCollapse{{ $ownersEquity['id'] }}">
                                            <span class="float-left text-dark">Total {{ $ownersEquity['owners_equity_name'] }}</span>
                                            <span class="float-right text-dark">Tk. {{ number_format($sum,2,".",",") }}</span>
                                        </button>
                                    </div>

                                    <div id="ownersEquityCollapse{{ $ownersEquity['id'] }}" class="collapse" aria-labelledby="ownersEquityHeading{{ $ownersEquity['id'] }}" data-parent="#ownersEquityAccordion">
                                        <div class="card-body p-l-20 p-r-20">
                                            <div id="subOwnersEquityAccordion{{ $ownersEquity['id'] }}">
                                                @foreach($subOwnersEquityData as $subOwnersEquity)
                                                    @if($subOwnersEquity['owners_equity_id'] == $ownersEquity['id'])
                                                        @php($ownersEquitySum = 0)
                                                        @foreach($ownersEquityAccounts as $value)
                                                            @if($value['owners_equity_id'] == $ownersEquity['id'] && $value['acc_id'] == $subOwnersEquity['id'])
                                                                @php($ownersEquitySum += $value['balance'])
                                                            @endif
                                                        @endforeach
                                                        <div class="card p-0">
                                                            <div class="card-header bg-primary p-0" id="subOwnersEquityHeading{{ $subOwnersEquity['id'] }}">
                                                                <button class="btn btn-link btn-block text-dark" data-toggle="collapse" data-target="#subOwnersEquityCollapse{{ $subOwnersEquity['id'] }}" aria-expanded="false" aria-controls="subOwnersEquityCollapse{{ $subOwnersEquity['id'] }}">
                                                                    <span class="float-left">Total {{ $subOwnersEquity['sub_owners_equity_name'] }}</span>
                                                                    <span class="float-right">Tk. {{ number_format($ownersEquitySum,2,".",",") }}</span>
                                                                </button>
                                                            </div>
                                                            <div id="subOwnersEquityCollapse{{ $subOwnersEquity['id'] }}" class="collapse" aria-labelledby="subOwnersEquityHeading{{ $subOwnersEquity['id'] }}" data-parent="#subOwnersEquityAccordion{{ $ownersEquity['id'] }}">
                                                                <div class="card-body p-20">
                                                                    <div class="table-responsive">
                                                                        <table class="table" style="margin-bottom: 0px;">
                                                                            @foreach($ownersEquityAccounts as $value)
                                                                                @if($value['owners_equity_id'] == $ownersEquity['id'] && $value['acc_id'] == $subOwnersEquity['id'])
                                                                                    <tr>
                                                                                        <th class="text-left">{{ $value['acc_name'] }}</th>
                                                                                        <td class="text-right">{{ number_format($value['balance'],2,".",",") }}</td>
                                                                                    </tr>
                                                                                @endif
                                                                            @endforeach
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php($totalEquity += $sum)
                            @endforeach
                        </div>
                        <div class="container">
                            <div class="row bg-info p-t-10 p-b-10 m-t-15">
                                <div class="col-md-6"><strong class="float-left text-dark">Total Equity</strong></div>
                                <div class="col-md-6"><strong class="float-right text-dark">Tk. {{ number_format($totalEquity,2,".",",") }}</strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End PAge Content -->
    </div>
@endsection
