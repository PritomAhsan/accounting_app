<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {
	protected $guarded = [];

	public function users() {
		return $this->belongsToMany( 'App\User', 'user_role', 'role_id', 'user_id' );
	}

	public function roleRoutes() {
		return $this->hasMany( RoleRoute::class );
	}

	public function makeRoleRoutes( $selectedOptions ) {
		$roleRoutes = [];
		foreach ( $selectedOptions as $selectedOption ) {
			$roleRoute             = new RoleRoute();
			$roleRoute->role_name  = $this->name;
			$roleRoute->route_name = $selectedOption;
			array_push( $roleRoutes, $roleRoute );
		}

		return $roleRoutes;
	}

	public function saveRole( $request ) {
		$this->name        = $request->name;
		$this->description = $request->description;
		$this->save();
		if ( $this->roleRoutes ) {
			$this->roleRoutes()->delete();
		}
		$this->roleRoutes()->saveMany( $this->makeRoleRoutes( $request->route_name ) );
	}

	public function deleteRole() {
		$this->roleRoutes()->delete();
		$this->delete();
	}

}
