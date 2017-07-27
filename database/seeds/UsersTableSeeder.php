<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
            'name' => 'Napaporn Sangraweewon',
            'email' => 'pns.playgirl@gmail.com',
            'password' => bcrypt('o4kri'),
            'type' => 'admin',
            'remember_token' => ''
        ]);   
    }
}
