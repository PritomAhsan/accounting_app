<?php

use App\User;
use Database\Seeds\SeederHelper;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function saveUser($userName) {
	    $user           = new User();
	    $user->name     = $userName;
	    $user->email    = $userName . '@bitbirds.com';
	    $user->password = bcrypt($user->email);
	    if($userName == 'info')
		    $user->admin_status = 1;
	    $user->save();
    }

    public function run()
    {

        $seederHelper = new SeederHelper();
        foreach ($seederHelper->userNames as $userName) {
	        $this->saveUser($userName);
        }

    }
}
