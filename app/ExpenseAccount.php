<?php

namespace App;

use App\Helpers\UpdateAccount;
use Illuminate\Database\Eloquent\Model;

class ExpenseAccount extends Model
{
	use UpdateAccount;

    public function saveChartOfAccountExpenseAccount( $request ) {
	    $this->expense_id = $request->expense_id;
	    $this->sub_expense_id = $request->sub_expense_id;
	    $this->account_name = $request->account_name;
	    $this->account_code = $request->account_code;
	    $this->account_description = $request->account_description;
	    $this->save();
    }
}
