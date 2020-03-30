<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
	public function saveProduct( $request ) {
		if ( $request->sell_status == 1 ) {
			$this->income_account_id = $request->income_account_id;
			$this->sell_status       = $request->sell_status;
		}
		if ( $request->buy_status == 1 ) {
			$this->expense_account_id = $request->expense_account_id;
			$this->buy_status         = $request->buy_status;
		}
		$this->product_name        = $request->product_name;
		$this->product_description = $request->product_description;
		$this->product_price       = $request->product_price;
		$this->save();
	}

	public function updateProduct( $request ) {
		if ( $request->sell_status == 1 || $request->income_account_id != 'demo' ) {
			$this->income_account_id = $request->income_account_id;
			$this->sell_status       = 1;
		}
		if ( $request->buy_status == 1 || $request->expense_account_id != 'demo' ) {
			$this->expense_account_id = $request->expense_account_id;
			$this->buy_status         = 1;
		}
		$this->product_name        = $request->product_name;
		$this->product_description = $request->product_description;
		$this->product_price       = $request->product_price;
		$this->save();
	}
}
