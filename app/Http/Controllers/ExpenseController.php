<?php

namespace App\Http\Controllers;

use App\Expense;
use App\SubExpense;
use Illuminate\Http\Request;
use DB;

class ExpenseController extends Controller {
	public function index() {
		$expenses    = Expense::all();
		$subExpenses = DB::table( 'sub_expenses' )
		                 ->join( 'expenses', 'sub_expenses.expense_id', '=', 'expenses.id' )
		                 ->select( 'sub_expenses.*', 'expenses.expense_name' )
		                 ->get();

		return view( 'expense.view-expense', [
			'expenses'    => $expenses,
			'subExpenses' => $subExpenses
		] );
	}

	public function createExpenseInfo( Request $request ) {
		$expense = new Expense();
		$expense->saveExpense( $request );

		return redirect( '/view-expense' );
	}

	public function editExpenseInfo( $id ) {
		$expense = Expense::find( $id );

		return json_encode( $expense );
	}

	public function updateExpenseInfo( Request $request ) {
		$expense = Expense::find( $request->expense_id );
		$expense->saveExpense( $request );

		return redirect( '/view-expense' );
	}

	public function createSubExpenseCode( $id ) {
		$expense    = Expense::find( $id );
		$subExpense = SubExpense::where( 'expense_id', $id )->orderBy( 'id', 'desc' )->first();
		if ( $subExpense ) {
			return $subExpense->sub_expense_code + 1;
		} else {
			return $expense->expense_code . '01';
		}
	}

	public function createSubExpenseInfo( Request $request ) {
		$subIExpense = new SubExpense();
		$subIExpense->saveSubExpense( $request );

		return redirect( '/view-expense' );
	}

	public function editSubExpenseInfo( $id ) {
		$subIExpense = SubExpense::find( $id );

		return json_encode( $subIExpense );
	}

	public function updateSubExpenseInfo( Request $request ) {
		$subIExpense = SubExpense::find( $request->sub_expense_id );
		$subIExpense->saveSubExpense( $request );

		return redirect( '/view-expense' );
	}
}
