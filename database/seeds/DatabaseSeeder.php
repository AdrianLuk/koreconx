<?php

use App\User;
use App\Email;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->delete();

        User::create([
            'first_name' => 'Adrian',
            'last_name'  => 'Luk',
            'email'      => 'aluk@email.com',
            'password'   => bcrypt('password')
        ]);
        Email::create([
            'user_id' => '1',
            'email' => 'aluk@email.com',
            'is_default' => '1'
        ]);
    }
}
