<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubLiabilitie extends Model {
	public function saveSubLiabilitie( $request ) {
		$this->liabilitie_id       = $request->liabilitie_id;
		$this->sub_liabilitie_name = $request->sub_liabilitie_name;
		$this->sub_liabilitie_code = $request->sub_liabilitie_code;
		$this->save();
	}
}
