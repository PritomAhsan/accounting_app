<?php

namespace App\Http\Controllers;

use App\OwnersEquity;
use App\SubOwnersEquity;
use Illuminate\Http\Request;
use DB;

class OwnersEquityController extends Controller {
	public function index() {
		$ownersEquities    = OwnersEquity::all();
		$subOwnersEquities = DB::table( 'sub_owners_equities' )
		                       ->join( 'owners_equities', 'sub_owners_equities.owners_equity_id', '=', 'owners_equities.id' )
		                       ->select( 'sub_owners_equities.*', 'owners_equities.owners_equity_name' )
		                       ->get();

		return view( 'owners-equity.view-owners-equity', [
			'ownersEquities'    => $ownersEquities,
			'subOwnersEquities' => $subOwnersEquities
		] );
	}

	public function createOwnersEquityInfo( Request $request ) {
		$ownersEquity = new OwnersEquity();
		$ownersEquity->saveOwnersEquity( $request );

		return redirect( '/owners-equity' );
	}

	public function editOwnersEquityInfo( $id ) {
		$ownersEquity = OwnersEquity::find( $id );

		return json_encode( $ownersEquity );
	}

	public function updateOwnersEquityInfo( Request $request ) {
		$ownersEquity = OwnersEquity::find( $request->owners_equity_id );
		$ownersEquity->saveOwnersEquity( $request );

		return redirect( '/owners-equity' );
	}

	public function createSubOwnersEquityCode( $id ) {
		$ownersEquity    = OwnersEquity::find( $id );
		$subOwnersEquity = SubOwnersEquity::where( 'owners_equity_id', $id )->orderBy( 'id', 'desc' )->first();
		if ( $subOwnersEquity ) {
			return $subOwnersEquity->sub_owners_equity_code + 1;
		} else {
			return $ownersEquity->owners_equity_code . '01';
		}
	}


	public function createSubOwnersEquityInfo( Request $request ) {
		$subOwnersEquity = new SubOwnersEquity();
		$subOwnersEquity->saveSubOwnersEquity( $request );

		return redirect( '/owners-equity' );
	}

	public function editSubOwnersEquityInfo( $id ) {
		$subOwnersEquity = SubOwnersEquity::find( $id );

		return json_encode( $subOwnersEquity );
	}

	public function updateSubOwnersEquityInfo( Request $request ) {
		$subOwnersEquity = SubOwnersEquity::find( $request->sub_owners_equity_id );
		$subOwnersEquity->saveSubOwnersEquity( $request );

		return redirect( '/owners-equity' );
	}

}
