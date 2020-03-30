<?php

namespace App\Http\Controllers;

use App\Income;
use App\SubIncome;
use Illuminate\Http\Request;
use DB;

class IncomeController extends Controller {
	public function index() {
		$incomes    = Income::all();
		$subIncomes = DB::table( 'sub_incomes' )
		                ->join( 'incomes', 'sub_incomes.income_id', '=', 'incomes.id' )
		                ->select( 'sub_incomes.*', 'incomes.income_name' )
		                ->get();

		return view( 'income.view-income', [
			'incomes'    => $incomes,
			'subIncomes' => $subIncomes
		] );
	}

	public function createIncomeInfo( Request $request ) {
		$income = new Income();
		$income->saveIncome( $request );

		return redirect( '/view-income' );
	}

	public function editIncomeInfo( $id ) {
		$income = Income::find( $id );

		return json_encode( $income );
	}

	public function updateIncomeInfo( Request $request ) {
		$income = Income::find( $request->income_id );
		$income->saveIncome( $request );

		return redirect( '/view-income' );
	}


	public function createSubIncomeCode( $id ) {
		$income    = Income::find( $id );
		$subIncome = SubIncome::where( 'income_id', $id )->orderBy( 'id', 'desc' )->first();
		if ( $subIncome ) {
			return $subIncome->sub_income_code + 1;
		} else {
			return $income->income_code . '01';
		}
	}

	public function createSubIncomeInfo( Request $request ) {
		$subIncome = new SubIncome();
		$subIncome->saveSubIncome( $request );

		return redirect( '/view-income' );
	}

	public function editSubIncomeInfo( $id ) {
		$subIncome = SubIncome::find( $id );

		return json_encode( $subIncome );
	}

	public function updateSubIncomeInfo( Request $request ) {
		$subIncome = SubIncome::find( $request->sub_income_id );
		$subIncome->saveSubIncome( $request );

		return redirect( '/view-income' );
	}

}

