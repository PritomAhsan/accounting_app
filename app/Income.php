<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model {
	public function saveIncome( $request ) {
		$this->income_name        = $request->income_name;
		$this->income_code        = $request->income_code;
		$this->income_description = $request->income_description;
		$this->save();
	}
}
