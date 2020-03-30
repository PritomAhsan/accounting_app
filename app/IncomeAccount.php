<?php

namespace App;

use App\Helpers\UpdateAccount;
use Illuminate\Database\Eloquent\Model;

class IncomeAccount extends Model {
	use UpdateAccount;

	public function saveChartOfAccountIncomeAccount( $request ) {
		$this->income_id           = $request->income_id;
		$this->sub_income_id       = $request->sub_income_id;
		$this->account_name        = $request->account_name;
		$this->account_code        = $request->account_code;
		$this->account_description = $request->account_description;
		$this->save();
	}
}
