<?php

namespace App\Http\Controllers;

use DB;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {
	public function index() {
		$roles = Role::all();

		return view( 'user.add-user', [ 'roles' => $roles ] );
	}

	public function createUser( Request $request ) {
		$user = new User();
		$user->saveUser( $request );

		return redirect( '/manage-user' );
	}

	public function manageUser() {
		return view( 'user.manage-user', [
			'users' => User::all()
		] );
	}

	public function editUser( $id ) {
		return view( 'user.edit-user', [
			'user'       => User::find( $id ),
			'roles'      => Role::all(),
			'user_roles' => DB::table( 'user_role' )->where( 'user_id', $id )->get()
		] );
	}

	public function updateUser( Request $request ) {
		$user = User::find( $request->user_id );
		$user->saveUser( $request );

		return redirect( '/manage-user' );
	}
}
