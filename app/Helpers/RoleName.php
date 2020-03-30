<?php
namespace App\Helpers;

use App\RoleRoute;

class RoleName {
	public static function getRoleName($routeName) {
		$routesData = RoleRoute::where('route_name', $routeName)->get();
		$result = [];
		foreach ($routesData as $routeData) {
			array_push($result, $routeData->role_name);
		}
		return $result;
	}
}