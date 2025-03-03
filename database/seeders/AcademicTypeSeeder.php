<?php

namespace Database\Seeders;

use App\Models\AcademicType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AcademicType::create([
            'name' => 'งานวิจัย',
        ]);
        AcademicType::create([
            'name' => 'วารสาร',
        ]);
        AcademicType::create([
            'name' => 'ตำรา',
        ]);
        AcademicType::create([
            'name' => 'บทความ',
        ]);
        AcademicType::create([
            'name' => 'หนังสือ',
        ]);
    }
}
