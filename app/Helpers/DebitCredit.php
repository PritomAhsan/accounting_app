<?php
/**
 * Created by PhpStorm.
 * User: Jahan
 * Date: 8/1/2018
 * Time: 9:31 AM
 */

namespace App\Helpers;


trait DebitCredit {
	public function addToCredit( $amount ) {
		$this->credit = $this->credit + $amount;
		$this->save();
	}

	public function deductFromCredit( $amount ) {
		$this->credit = $this->credit - $amount;
		$this->save();
	}

	public function addToDebit( $amount ) {
		$this->debit = $this->debit + $amount;
		$this->save();
	}

	public function deductFromDebit( $amount ) {
		$this->debit = $this->debit - $amount;
		$this->save();
	}
}