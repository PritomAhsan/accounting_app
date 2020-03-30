<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManualJournal extends Model {
	public function saveManualJournal( $request ) {
		$this->date        = $request->date;
		$this->description = $request->description;
		$this->debit       = $request->total_debit;
		$this->credit      = $request->total_crebit;
		$this->save();
	}
}
