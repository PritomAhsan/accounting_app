<?php

namespace App\Http\Controllers;

use App\Role;
use App\RoleRoute;
use Illuminate\Http\Request;
use Route;
use DB;

class RoleController extends Controller {
	public function index() {
		$routeLists = Route::getRoutes();

		return view( 'role.add-role', [ 'routeLists' => $routeLists ] );
	}

	public function createRole( Request $request ) {
		$role = new Role();
		$role->saveRole( $request );
		return redirect( '/manage-role' );
	}

	public function manageRole() {
		$roles      = Role::all();
		$roleRoutes = RoleRoute::all();

		return view( 'role.manage-role', [
			'roles'      => $roles,
			'roleRoutes' => $roleRoutes
		] );
	}

	public function editRole( $id ) {
		return view( 'role.edit-role', [
			'role'       => Role::find( $id ),
			'roleRoutes' => RoleRoute::where( 'role_id', $id )->get(),
			'routeLists' => Route::getRoutes()
		] );
	}

	public function updateRole( Request $request ) {
		$role = Role::find( $request->role_id );
		$role->saveRole( $request );

		return redirect( '/manage-role' );
	}
}
