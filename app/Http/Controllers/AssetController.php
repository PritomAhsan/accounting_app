<?php

namespace App\Http\Controllers;

use App\Asset;
use App\SubAsset;
use Illuminate\Http\Request;
use DB;

class AssetController extends Controller {
	public function index() {
		$assets    = Asset::all();
		$subAssets = DB::table( 'sub_assets' )
		               ->join( 'assets', 'sub_assets.asset_id', '=', 'assets.id' )
		               ->select( 'sub_assets.*', 'assets.asset_name' )
		               ->get();

		return view( 'assets.view-assets', [
			'assets'    => $assets,
			'subAssets' => $subAssets
		] );
	}

	public function createAssetInfo( Request $request ) {
		$asset = new Asset();
		$asset->saveAsset( $request );

		return redirect( '/view-asset' );
	}

	public function editAssetInfo( $id ) {
		$asset = Asset::find( $id );

		return json_encode( $asset );
	}

	public function updateAssetInfo( Request $request ) {
		$asset = Asset::find( $request->asset_id );
		$asset->saveAsset( $request );

		return redirect( '/view-asset' );
	}

	public function createSubAssetCode( $id ) {
		$asset    = Asset::find( $id );
		$subAsset = SubAsset::where( 'asset_id', $id )->orderBy( 'id', 'desc' )->first();
		if ( $subAsset ) {
			return $subAsset->sub_asset_code + 1;
		} else {
			return $asset->asset_code . '01';
		}
	}

	public function createSubAssetInfo( Request $request ) {
		$subAsset = new SubAsset();
		$subAsset->saveSubAsset( $request );

		return redirect( '/view-asset' );
	}

	public function editSubAssetInfo( $id ) {
		$subAsset = SubAsset::find( $id );

		return json_encode( $subAsset );
	}

	public function updateSubAssetInfo( Request $request ) {
		$subAsset = SubAsset::find( $request->sub_asset_id );
		$subAsset->saveSubAsset( $request );

		return redirect( '/view-asset' );
	}
}
