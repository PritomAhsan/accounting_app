<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public function saveAsset($request) {
	    $this->asset_name = $request->asset_name;
	    $this->asset_code = $request->asset_code;
	    $this->asset_description = $request->asset_description;
	    $this->save();
    }
}
