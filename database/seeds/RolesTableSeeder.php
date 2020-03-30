<?php

use App\Role;
use Database\Seeds\SeederHelper;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function saveRole($roleName) {
	    $role = new Role();
	    $role->name = $roleName;
	    $role->description = $roleName;
	    $role->save();
    }

    public function run()
    {
        $seederHelper = new SeederHelper();

        foreach ($seederHelper->roleNames as $roleName) {
        	$this->saveRole($roleName);
        }


    }
}
