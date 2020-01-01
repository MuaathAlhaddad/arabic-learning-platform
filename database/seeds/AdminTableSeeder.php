<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'muaath',
            'email' => 'muaath2000@gmail.com',
            'password' => Hash::make('01128853086'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
