<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubExpense extends Model {
	public function saveSubExpense( $request ) {
		$this->expense_id       = $request->expense_id;
		$this->sub_expense_name = $request->sub_expense_name;
		$this->sub_expense_code = $request->sub_expense_code;
		$this->save();
	}
}
