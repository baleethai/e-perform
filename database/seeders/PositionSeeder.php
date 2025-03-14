<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create([
            'department_id' => 1,
            'type' => 'academic',
            'name' => 'ผู้อำนวยการ',
        ]);
        Position::create([
            'department_id' => 1,
            'type' => 'academic',
            'name' => 'รองผู้อำนวยการ',
        ]);
    }
}
