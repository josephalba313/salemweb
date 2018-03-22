<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting.create([
            'site_name' => 'Salem',
            'address' => 'Villa Pacita Subdivision, Brgy San Juan, Molo, Iloilo City',
            'contact_number' => '0919 563 9291',
            'contact_email' => 'ciph844@gmail.com']);

    }
}
