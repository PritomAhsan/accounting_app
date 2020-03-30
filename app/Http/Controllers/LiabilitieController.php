<?php

namespace App\Http\Controllers;

use App\Liabilitie;
use App\SubLiabilitie;
use Illuminate\Http\Request;
use DB;

class LiabilitieController extends Controller {
	public function index() {
		$liabilities    = Liabilitie::all();
		$subLiabilities = DB::table( 'sub_liabilities' )
		                    ->join( 'liabilities', 'sub_liabilities.liabilitie_id', '=', 'liabilities.id' )
		                    ->select( 'sub_liabilities.*', 'liabilities.liabilitie_name' )
		                    ->get();

		return view( 'liabilities.view-liabilities', [
			'liabilities'    => $liabilities,
			'subLiabilities' => $subLiabilities
		] );
	}

	public function createLiabilitieInfo( Request $request ) {
		$liabilitie = new Liabilitie();
		$liabilitie->saveLiabilitie( $request );

		return redirect( '/view-liabilities' );
	}

	public function editLiabilitieInfo( $id ) {
		$liabilitie = Liabilitie::find( $id );

		return json_encode( $liabilitie );
	}

	public function updateLiabilitieInfo( Request $request ) {
		$liabilitie = Liabilitie::find( $request->liabilitie_id );
		$liabilitie->saveLiabilitie( $request );

		return redirect( '/view-liabilities' );
	}

	public function createSubLiabilitieCode( $id ) {
		$liabilitie    = Liabilitie::find( $id );
		$subLiabilitie = SubLiabilitie::where( 'liabilitie_id', $id )->orderBy( 'id', 'desc' )->first();
		if ( $subLiabilitie ) {
			return $subLiabilitie->sub_liabilitie_code + 1;
		} else {
			return $liabilitie->liabilitie_code . '01';
		}
	}

	public function createSubLiabilitieInfo( Request $request ) {
		$subLiabilitie = new SubLiabilitie();
		$subLiabilitie->saveSubLiabilitie( $request );

		return redirect( '/view-liabilities' );
	}

	public function editSubLiabilitieInfo( $id ) {
		$subLiabilities = SubLiabilitie::find( $id );

		return json_encode( $subLiabilities );
	}

	public function updateSubLiabilitieInfo( Request $request ) {
		$subLiabilitie = SubLiabilitie::find( $request->sub_liabilitie_id );
		$subLiabilitie->saveSubLiabilitie( $request );

		return redirect( '/view-liabilities' );
	}

}
