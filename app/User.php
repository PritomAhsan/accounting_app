<?php

namespace App;

use App\Helpers\RoleName;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	public function roles() {
		return $this->belongsToMany( 'App\Role', 'user_role', 'user_id', 'role_id' );
	}

	public function hasOneOfRoles( $roles ) {
		if ( is_array( $roles ) ) {
			foreach ( $roles as $role ) {
				if ( $this->hasRole( $role ) ) {
					return true;
				}
			}
		} else {
			if ( $this->hasRole( $roles ) ) {
				return true;
			}
		}

		return false;
	}

	public function hasRole( $role ) {
		if ( $this->roles()->where( 'name', $role )->first() ) {
			return true;
		}

		return false;
	}

	public function hasAccessToRoute( $routeName ) {
		$roles = RoleName::getRoleName( $routeName );
		if ( $this->hasOneOfRoles( $roles ) ) {
			return true;
		} else {
			return false;
		}
	}

	public function hasAccessToRoutes( $routeNames ) {
		foreach ( $routeNames as $routeName ) {
			if ( $this->hasAccessToRoute( $routeName ) ) {
				return true;
			}

			return false;
		}
	}

	public function saveUser( $request ) {
		$this->name  = $request->name;
		$this->email = $request->email;
		if ( $request->password != null ) {
			$this->password = bcrypt( $request->password );
		}
		$this->remember_token = str_random( 70 );
		$this->save();
		if ( $this->roles ) {
			$this->roles()->detach();
		}
		$this->roles()->attach( $request->role );
	}

	public function deleteUser() {
		$this->roles()->detach();
		$this->delete();
	}
}
