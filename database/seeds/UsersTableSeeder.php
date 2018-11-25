<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        $user = new User;
        $user->name = "admin";
        $user->email = "admin@gmail.com";
        $user->username = "admin";
        $user->password = bcrypt('admin');
        $user->is_admin = true;
        $user->save();
    }
}
