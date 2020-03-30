<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model {
	public function saveBillDetail( $bill, $selectedOption ) {
		$this->bill_id          = $bill->id;
		$this->item_id          = $selectedOption['item_id'];
		$this->item_name        = $selectedOption['item_name'];
		$this->item_description = $selectedOption['item_description'];
		$this->item_quantity    = $selectedOption['item_quantity'];
		$this->item_price       = $selectedOption['item_price'];
		$this->save();
	}
}
