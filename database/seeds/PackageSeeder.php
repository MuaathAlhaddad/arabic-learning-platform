<?php

use App\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Package::create([
            'name' => 'Basic',
            'no_hours' => 10,
            'price' => 25.00,
        ]);
        Package::create([
            'name' => 'Standard',
            'no_hours' => 25,
            'price' => 50.00,
        ]);        
        Package::create([
            'name' => 'Premium',
            'no_hours' => 60,
            'price' => 100.00,
        ]);
    }
}
