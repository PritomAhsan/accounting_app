<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubIncome extends Model {
	public function saveSubIncome( $request ) {
		$this->income_id       = $request->income_id;
		$this->sub_income_name = $request->sub_income_name;
		$this->sub_income_code = $request->sub_income_code;
		$this->save();
	}
}
