<?php
/**
 * Created by PhpStorm.
 * User: Jahan
 * Date: 8/1/2018
 * Time: 9:28 AM
 */

namespace App\Helpers;


trait Payment {
	public function addToPaidAmount( $amount ) {
		$this->paid_amount = $this->paid_amount + $amount;
		$this->save();
	}

	public function deductFromPaidAmount( $amount ) {
		$this->paid_amount = $this->paid_amount - $amount;
		$this->save();
	}

	public function updatePaymentStatus( $journal ) {
		if ( $journal->credit == $journal->debit ) {
			$this->payment_status = 'Complete';
		}
		$this->save();
	}
}