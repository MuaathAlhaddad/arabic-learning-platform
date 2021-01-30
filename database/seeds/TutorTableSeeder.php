<?php

use App\Tutor;
use App\DayTimeTutor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TutorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $muaath = Tutor::create([
            'first_name'            => 'Muaath',
            'last_name'             => 'Almrham',
            'email'                 => 'muaath2000@gmail.com',
            'ic_passport_no'        => '111111',
            'password'              => Hash::make('111111'),
            'address'               => 'Medan Idaman',
            'country'               => 'Malaysia',
            'profile_photo'         => "http://lorempixel.com/200/200/nature/",
            'headline'              => 'Arabic Expert',
            'gender'                => 'Male',
            'tutor_desc'            => 'Hello, I am Mohammed I am from Yemen, a native Arabic speaker and experienced Arabic and Quran tutor. I have been teaching Arabic language and Quran at Itqan center and mosque for more than 10 years and still to the date, I am sao much interested in teaching foreigners online.'
        ]);
        $muaath->day_times()->sync([11,6,1,8,9,10]);
        $muaath->save();

        $read = Tutor::create([
            'first_name'            => 'Raed',
            'last_name'             => 'Almrham',
            'email'                 => 'Raed2000@gmail.com',
            'ic_passport_no'        => '222222',
            'password'              => Hash::make('222222'),
            'address'               => 'Ryadh',
            'country'               => 'Saudi Arabia',
            'profile_photo'         => "http://lorempixel.com/200/200/nature/",
            'headline'              => 'Arabic Teacher',
            'gender'                => 'Male',
            'tutor_desc'            => 'I am a Native Arabic speaker, I have 2 years teaching experience. I am passionate on my language and I would love to spread it around the the world to get people know more about the beauty and literatures of Arabic language.'
        ]);
        $read->day_times()->sync([5,6,7,8,9,10]);
        $read->save();

        $sarah = Tutor::create([
            'first_name'            => 'Sarah',
            'last_name'             => 'Alnhari',
            'email'                 => 'Sarah@gmail.com',
            'ic_passport_no'        => '333333',
            'password'              => Hash::make('333333'),
            'address'               => 'Makkah',
            'country'               => 'Saudi Arabia',
            'profile_photo'         => "http://lorempixel.com/200/200/nature/",
            'headline'              => 'Native Speaker',
            'gender'                => 'Male',
            'tutor_desc'            => 'I love teaching poeple my language.'
        ]);
        $sarah->day_times()->sync([1,2,3,4]);
        $sarah->save();
        
    }
}
