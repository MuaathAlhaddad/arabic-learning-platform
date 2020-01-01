<?php

use App\DayTime;
use Illuminate\Database\Seeder;

class DayTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=8; $i < 21; $i++) { 

            DayTime::create([
                'day' => 'Mon',
                'timeslot' => $i
            ]);
            DayTime::create([
                'day' => 'Tue',
                'timeslot' => $i
            ]);
            DayTime::create([
                'day' => 'Wed',
                'timeslot' => $i
            ]);
            DayTime::create([
                'day' => 'Thu',
                'timeslot' => $i
            ]);
            DayTime::create([
                'day' => 'Fri',
                'timeslot' => $i
            ]);
            DayTime::create([
                'day' => 'Sat',
                'timeslot' => $i
            ]);
            DayTime::create([
                'day' => 'Sun',
                'timeslot' => $i
            ]);
        }
        for ($i=8; $i < 21; $i++) { 
            
        }
        for ($i=8; $i < 21; $i++) { 
            
        }
        for ($i=8; $i < 21; $i++) { 
            
        }
        for ($i=8; $i < 21; $i++) { 
            
        }
        for ($i=8; $i < 21; $i++) { 
            
        }
        for ($i=8; $i < 21; $i++) { 
            
        }
    }
}
