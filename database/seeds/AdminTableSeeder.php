<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           'id' => '1',
            'name' => 'Admin',
            'matricNo' => 'A000001',
            'email' => 'admin@cdm.com',
            'password' => bcrypt('password'),
            'userRole' => 'admin',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
