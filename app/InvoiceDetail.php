<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model {
	public function saveInvoiceDetail( $invoice, $selectedOption ) {
		$this->invoice_id       = $invoice->id;
		$this->item_id          = $selectedOption['item_id'];
		$this->item_name        = $selectedOption['item_name'];
		$this->item_description = $selectedOption['item_description'];
		$this->item_quantity    = $selectedOption['item_quantity'];
		$this->item_price       = $selectedOption['item_price'];
		$this->save();
	}
}
