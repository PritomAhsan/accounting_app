<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ownersEquity extends Model {
	public function saveOwnersEquity( $request ) {
		$this->owners_equity_name        = $request->owners_equity_name;
		$this->owners_equity_code        = $request->owners_equity_code;
		$this->owners_equity_description = $request->owners_equity_description;
		$this->save();
	}
}
