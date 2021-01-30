<?php

use App\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'first_name' => 'Muaath',
            'last_name'  => 'Almrham',
            'email'      => 'muaath2000@gmail.com',
            'profile_photo' => "http://lorempixel.com/200/200/nature/",
            'password'   => Hash::make('01128853086'),
            'gender'    =>'male'
        ]);
    }
}
