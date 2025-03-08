<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'name' => 'สำนักงานวิทยาลัย'
        ]);
        Department::create([
            'name' => 'สำนักงานวิชาการ'
        ]);
    }
}
