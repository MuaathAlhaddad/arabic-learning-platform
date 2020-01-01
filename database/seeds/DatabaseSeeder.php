<?php

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
        $this->call(AdminTableSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(DayTimeSeeder::class);
        // $this->call(TutorTableSeeder::class);
        $this->call(StudentTableSeeder::class);

        



    }
}
