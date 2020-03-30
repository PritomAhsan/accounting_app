<?php

namespace App\Http\Controllers;

use App\BillDetail;
use App\ExpenseAccount;
use App\IncomeAccount;
use App\InvoiceDetail;
use App\Product;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller {
	public function index() {
		$incomeAccounts  = IncomeAccount::all();
		$expenseAccounts = ExpenseAccount::all();
		$products        = Product::all();

		return view( 'product.product-info', [
			'incomeAccounts'  => $incomeAccounts,
			'expenseAccounts' => $expenseAccounts,
			'products'        => $products
		] );
	}

	public function createProductInfo( Request $request ) {
		$product = new Product();
		$product->saveProduct( $request );

		return back();
	}

	public function getProductInfoById( $id ) {
		$product = Product::find( $id );

		return json_encode( $product );
	}

	public function productInvoiceBillStatus( $productId ) {
		$productInvoices = InvoiceDetail::where( 'item_id', $productId )->get();
		$productBills    = BillDetail::where( 'item_id', $productId )->get();
		if ( $productInvoices->isEmpty() && $productBills->isEmpty() ) {
			$status = 1;

			return json_decode( $status );
		} else {
			$status = 0;

			return json_decode( $status );
		}
	}

	public function updateProductInfo( Request $request ) {
		$product = Product::find( $request->product_id );
		$product->updateProduct( $request );

		return back();
	}

	public function deleteProductInfo( Request $request ) {

		$product = Product::find( $request->productId );
		if ( $product->income_account_id != null && $product->expense_account_id != null ) {

			$message = 'Buy & Sell';

			return json_encode( $message );


		} else if ( $product->income_account_id != null ) {
			$itemInvoices = InvoiceDetail::where( 'item_id', $product->id )->get();
			if ( ! $itemInvoices->isEmpty() ) {
				$message = 'Sorry !! You can not delete this item. This item already use to create an invoice.';

				return json_encode( $message );
			} else {
				$product->delete();
				$message = 'Product info delete successfully';

				return json_encode( $message );
			}
		} else if ( $product->expense_account_id != null ) {
			$itemBills = BillDetail::where( 'item_id', $product->id )->get();
			if ( ! $itemBills->isEmpty() ) {
				$message = 'Sorry !! You can not delete this item. This item already use to create a bill.';

				return json_encode( $message );
			} else {
				$product->delete();
				$message = 'Product info delete successfully';

				return json_encode( $message );
			}
		}
	}

}
