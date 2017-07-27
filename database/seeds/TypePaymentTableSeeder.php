<?php

use Illuminate\Database\Seeder;

class TypePaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_payments')->insert([
            'name' => 'รับเช็ค'
        ]);   
        DB::table('type_payments')->insert([
            'name' => 'วางบิล'
        ]);
    }
}
