<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                                       'name' => 'User1',
                                       'email' => 'nglelinh@gmail.com',
                                       'password' => bcrypt('password'),
                                       'is_admin' => true
                                   ]);
    }
}
