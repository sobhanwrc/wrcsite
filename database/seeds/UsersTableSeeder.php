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
        $user = new \App\User();
        $user->name = "Partho Sen";
        $user->email = "wrctec@gmail.com";
        $user->password = bcrypt("12345678");

        $user->save();
    }
}
