<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model {
	public function saveExpense( $request ) {
		$this->expense_name        = $request->expense_name;
		$this->expense_code        = $request->expense_code;
		$this->expense_description = $request->expense_description;
		$this->save();
	}
}
