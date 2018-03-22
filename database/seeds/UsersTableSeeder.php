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
        $user = App\User::create([
            'name' => 'Mikko',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'upload/avatar/1.png',
            'about' => 'Lorem',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'


        ]);
    }
}
