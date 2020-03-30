<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubAsset extends Model
{
    public function saveSubAsset($request) {
	    $this->asset_id = $request->asset_id;
	    $this->sub_asset_name = $request->sub_asset_name;
	    $this->sub_asset_code = $request->sub_asset_code;
	    $this->save();
    }
}
