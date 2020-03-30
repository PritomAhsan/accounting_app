<?php

namespace App\Http\Controllers;

use App\AssetAccount;
use App\Asset;
use App\Journal;
use App\Liabilitie;
use App\LiabilitieAccount;
use App\SubAsset;
use App\SubLiabilitie;
use App\OwnersEquityAccount;
use App\SubOwnersEquity;
use App\OwnersEquity;
use DB;

class BalanceSheetController extends Controller
{
	function getLiabilitiesAccountWithBalance($journals) {
		$liabilitiesAccounts = LiabilitieAccount::all();
		$liabilitiesJournal = [];
		$liabilitiesName = [];
		$subLiabilitiesId = [];
		$liabilitiesId = [];
		foreach ($liabilitiesAccounts as $liabilitiesAccount) {
			foreach ($journals as $journal) {
				if($liabilitiesAccount->account_code == $journal->account_code) {
					array_push($liabilitiesJournal, $journal->account_code);
					array_push($liabilitiesName, $liabilitiesAccount->account_name);
					array_push($subLiabilitiesId, $liabilitiesAccount->sub_liabilitie_id);
					array_push($liabilitiesId, $liabilitiesAccount->liabilitie_id);
					break;
				}
			}
		}

		$liabilitiesDebit = 0;
		$liabilitiesCredit = 0;
		$c = [];

		foreach ($liabilitiesJournal as $value) {
			$journals = Journal::where('account_code', $value)->get();
			foreach ($journals as $journal) {
				$liabilitiesDebit +=$journal->debit;
				$liabilitiesCredit +=$journal->credit;
			}
			array_push($c, ($liabilitiesDebit-$liabilitiesCredit));
			$liabilitiesDebit  = 0;
			$liabilitiesCredit = 0;
		}
		$liabilitiesData =[];
		for ($i=0; $i<count($liabilitiesName); $i++) {
			$liabilitiesData[$i]['balance']             = $c[$i];
			$liabilitiesData[$i]['acc_name']            = $liabilitiesName[$i];
			$liabilitiesData[$i]['sub_liabilitie_id']   = $subLiabilitiesId[$i];
			$liabilitiesData[$i]['liabilitie_id']       = $liabilitiesId[$i];
		}
		return $liabilitiesData;
	}

	private function getLiabilitiesInfoByLiabilitiesData($liabilitiesAccounts) {
		$liabilitiesArray   = [];
		foreach ($liabilitiesAccounts as $data) {
			if(!isset($liabilitiesArray['liabilitie_id']) == $data['liabilitie_id']) {
				array_push($liabilitiesArray, $data['liabilitie_id']);
			}
		}
		$data = array_unique($liabilitiesArray);
		$newData =array_values($data);
		$liabilitieData = [];
		foreach ($newData as $value) {
			$liabilitie = Liabilitie::find($value);
			array_push($liabilitieData, $liabilitie);
		}
		return $liabilitieData;
	}

	private function getSubLiabilitiesInfoByLiabilitiesData($liabilitiesAccounts) {
		$newArray   = [];
		foreach ($liabilitiesAccounts as $data) {
			if(!isset($newArray['sub_liabilitie_id']) == $data['sub_liabilitie_id']) {
				array_push($newArray, $data['sub_liabilitie_id']);
			}
		}

		$data = array_unique($newArray);
		$newData =array_values($data);
		$subLiabilitiesData = [];
		foreach ($newData as $value) {
			$subLiabilitie = SubLiabilitie::find($value);
			array_push($subLiabilitiesData, $subLiabilitie);
		}
		return $subLiabilitiesData;
	}



	function getAssetAccountWithBalance($journals) {
		$assetAccounts = AssetAccount::all();

		$assetJournal = [];
		$accountsName = [];
		$subAssetsId = [];
		$assetsId = [];
		foreach ($assetAccounts as $assetAccount) {
			foreach ($journals as $journal) {
				if($assetAccount->account_code == $journal->account_code) {
					array_push($assetJournal, $journal->account_code);
					array_push($accountsName, $assetAccount->account_name);
					array_push($subAssetsId, $assetAccount->sub_asset_id);
					array_push($assetsId, $assetAccount->asset_id);
					break;
				}
			}
		}

		$debit = 0;
		$credit = 0;
		$c = [];

		foreach ($assetJournal as $value) {
			$journals = Journal::where('account_code', $value)->get();
			foreach ($journals as $journal) {
				$debit +=$journal->debit;
				$credit +=$journal->credit;
			}
			array_push($c, ($debit-$credit));
			$debit  = 0;
			$credit = 0;
		}
		$data = [];
		for ($i=0; $i<count($accountsName); $i++) {
			$data[$i]['balance'] = $c[$i];
			$data[$i]['acc_name'] = $accountsName[$i];
			$data[$i]['acc_id'] = $subAssetsId[$i];
			$data[$i]['asset_id'] = $assetsId[$i];
		}
		return $data;
	}

	private function getSubAssetInfoByAssetData($assetData) {
		$newArray   = [];
		foreach ($assetData as $data) {
			if(!isset($newArray['acc_id']) == $data['acc_id']) {
				array_push($newArray, $data['acc_id']);
			}
		}
		$data = array_unique($newArray);
		$newData =array_values($data);
		$subAssetData = [];
		foreach ($newData as $value) {
			$subAsset = SubAsset::find($value);
			array_push($subAssetData, $subAsset);
		}
		return $subAssetData;
	}

	private function getAssetInfoByAssetData($assetAccounts) {
		$assetArray   = [];
		foreach ($assetAccounts as $data) {
			if(!isset($assetArray['asset_id']) == $data['asset_id']) {
				array_push($assetArray, $data['asset_id']);
			}
		}
		$data = array_unique($assetArray);
		$newData =array_values($data);
		$assetData = [];
		foreach ($newData as $value) {
			$asset = Asset::find($value);
			array_push($assetData, $asset);
		}
		return $assetData;
	}

	function getOwnersEquityAccountWithBalance($journals) {
		$ownersEquityAccounts = OwnersEquityAccount::all();

		$ownersEquityJournal = [];
		$accountsName = [];
		$subOwnersEquityId = [];
		$ownersEquityId = [];
		foreach ($ownersEquityAccounts as $ownersEquityAccount) {
			foreach ($journals as $journal) {
				if($ownersEquityAccount->account_code == $journal->account_code) {
					array_push($ownersEquityJournal, $journal->account_code);
					array_push($accountsName, $ownersEquityAccount->account_name);
					array_push($subOwnersEquityId, $ownersEquityAccount->sub_owners_equity_id);
					array_push($ownersEquityId, $ownersEquityAccount->owners_equity_id);
					break;
				}
			}
		}

		$debit = 0;
		$credit = 0;
		$c = [];

		foreach ($ownersEquityJournal as $value) {
			$journals = Journal::where('account_code', $value)->get();
			foreach ($journals as $journal) {
				$debit +=$journal->debit;
				$credit +=$journal->credit;
			}
			array_push($c, ($credit - $debit));
			$debit  = 0;
			$credit = 0;
		}
		$data = [];
		for ($i=0; $i<count($accountsName); $i++) {
			$data[$i]['balance'] = $c[$i];
			$data[$i]['acc_name'] = $accountsName[$i];
			$data[$i]['acc_id'] = $subOwnersEquityId[$i];
			$data[$i]['owners_equity_id'] = $ownersEquityId[$i];
		}
		return $data;
	}


	private function getOwnersEquityInfoByOwnersEquityData($ownersEquityAccounts) {
		$ownersEquityArray   = [];
		foreach ($ownersEquityAccounts as $data) {
			if(!isset($ownersEquityArray['owners_equity_id']) == $data['owners_equity_id']) {
				array_push($ownersEquityArray, $data['owners_equity_id']);
			}
		}
		$data = array_unique($ownersEquityArray);
		$newData =array_values($data);
		$ownersEquityData = [];
		foreach ($newData as $value) {
			$ownersEquity = OwnersEquity::find($value);
			array_push($ownersEquityData, $ownersEquity);
		}
		return $ownersEquityData;
	}

	private function getSubOwnersEquityInfoByOwnersEquityData($ownersEquityAccounts) {
		$newArray   = [];
		foreach ($ownersEquityAccounts as $data) {
			if(!isset($newArray['acc_id']) == $data['acc_id']) {
				array_push($newArray, $data['acc_id']);
			}
		}

		$data = array_unique($newArray);
		$newData =array_values($data);
		$subOwnersEquityData = [];
		foreach ($newData as $value) {
			$subOwnersEquity = SubOwnersEquity::find($value);
			array_push($subOwnersEquityData, $subOwnersEquity);
		}
		return $subOwnersEquityData;
	}



	public function index() {
		$journals           =   Journal::all();

		$assetAccounts      =   $this->getAssetAccountWithBalance($journals);
		$assetData          =   $this->getAssetInfoByAssetData($assetAccounts);
		$subAssetData       =   $this->getSubAssetInfoByAssetData($assetAccounts);

		$liabilitiesAccounts    =   $this->getLiabilitiesAccountWithBalance($journals);
		$liabilitiesData        =   $this->getLiabilitiesInfoByLiabilitiesData($liabilitiesAccounts);
		$subLiabilitiesData     =   $this->getSubLiabilitiesInfoByLiabilitiesData($liabilitiesAccounts);

		$ownersEquityAccounts   =   $this->getOwnersEquityAccountWithBalance($journals);
		$ownersEquityData       =   $this->getOwnersEquityInfoByOwnersEquityData($ownersEquityAccounts);
		$subOwnersEquityData    =   $this->getSubOwnersEquityInfoByOwnersEquityData($ownersEquityAccounts);


		return view('balance-sheet.balance-sheet', [
			'assetAccounts'         =>  $assetAccounts,
			'subAssetData'          =>  $subAssetData,
			'assetData'             =>  $assetData,
			'liabilitiesAccounts'   =>  $liabilitiesAccounts,
			'liabilitieData'        =>  $liabilitiesData,
			'subLiabilitiesData'    =>  $subLiabilitiesData,
			'ownersEquityAccounts'  =>  $ownersEquityAccounts,
			'ownersEquityData'      =>  $ownersEquityData,
			'subOwnersEquityData'   =>  $subOwnersEquityData

		]);
	}
}
