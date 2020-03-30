<?php
/**
 * Created by PhpStorm.
 * User: Jahan
 * Date: 8/2/2018
 * Time: 8:20 AM
 */

namespace App\Helpers;


class TransactionId {
	public static function makeTransactionId( $transactionType, $transactionTail ) {
		$transactionType = strtolower( $transactionType );
		switch ( $transactionType ) {
			case 'invoice':
				return 'inv-' . $transactionTail;
			case 'bill':
				return 'bil-' . $transactionTail;
			case 'income':
				return 'inc-' . $transactionTail;
			case 'expense':
				return 'exp-' . $transactionTail;
			case 'manual':
				return 'man-' . $transactionTail;
			default:
				return false;
		}
	}

	public static function getTransactionHead( $transactionId ) {
		return substr( $transactionId, 0, 3 );
	}

	public static function getTransactionTail( $transactionId ) {
		return substr( $transactionId, 4, 1 );
	}

	public static function getTransactionType( $transactionId ) {
		$transactionHead = self::getTransactionHead( $transactionId );
		switch ( $transactionHead ) {
			case 'inv':
				return 'invoice';
			case 'bil':
				return 'bill';
			case 'inc':
				return 'income';
			case 'exp':
				return 'expense';
			case 'man':
				return 'manual';
			default:
				return false;
		}
	}
}