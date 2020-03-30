<?php

namespace App;

use App\Helpers\UpdateAccount;
use Illuminate\Database\Eloquent\Model;

class ownersEquityAccount extends Model {
	use UpdateAccount;

	public function saveChartOfAccountOwnersEquityAccount( $request ) {
		$this->owners_equity_id     = $request->owners_equity_id;
		$this->sub_owners_equity_id = $request->sub_owners_equity_id;
		$this->account_name         = $request->account_name;
		$this->account_code         = $request->account_code;
		$this->account_description  = $request->account_description;
		$this->save();
	}
}
