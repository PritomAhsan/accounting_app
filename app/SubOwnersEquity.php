<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubOwnersEquity extends Model {
	public function saveSubOwnersEquity( $request ) {
		$this->owners_equity_id       = $request->owners_equity_id;
		$this->sub_owners_equity_name = $request->sub_owners_equity_name;
		$this->sub_owners_equity_code = $request->sub_owners_equity_code;
		$this->save();
	}
}
