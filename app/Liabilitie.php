<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liabilitie extends Model {
	public function saveLiabilitie( $request ) {
		$this->liabilitie_name        = $request->liabilitie_name;
		$this->liabilitie_code        = $request->liabilitie_code;
		$this->liabilitie_description = $request->liabilitie_description;
		$this->save();
	}
}
