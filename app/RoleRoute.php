<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleRoute extends Model {
	protected $guarded = [];

	public function role() {
		return $this->belongsTo( Role::class );
	}

	public function saveRoleRoute( $selectedOption, $role ) {
		$this->role_id    = $role->id;
		$this->role_name  = $role->name;
		$this->route_name = $selectedOption;
		$this->save();
	}
}
