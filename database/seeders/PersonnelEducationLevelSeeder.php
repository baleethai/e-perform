<?php

namespace Database\Seeders;

use App\Models\PersonnelEducationLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonnelEducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersonnelEducationLevel::create([
            'name' => 'ปริญญาตรี'
        ]);
        PersonnelEducationLevel::create([
            'name' => 'ปริญญาโท'
        ]);
        PersonnelEducationLevel::create([
            'name' => 'ปริญญาเอก'
        ]);
    }
}
