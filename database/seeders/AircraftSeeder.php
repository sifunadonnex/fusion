<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AircraftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Aircraft::create(
        [
            'registration' => '5X-UGF',
            'program' => 'C208',
            'serial_number' => '208-00350',
            'manufacturer_model' => 'Cessna 208B',
            'total_hours' => '10000',
            'total_hours_date' => '2021-01-01',
            'total_cycles' => '20000',
            'total_cycles_date' => '2021-01-01',
            'date_of_manufacture' => '2000-01-01',
        ],
    );
    }
}
