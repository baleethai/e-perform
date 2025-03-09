<?php

namespace Database\Seeders;

use App\Enums\VisibleStatus;
use App\Enums\WorkStatus;
use App\Models\Personnel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonnelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Personnel::create([
        //     'prefix_id' => 1,
        //     'position_id' => 1,
        //     'code' => '000000001',
        //     'first_name' => 'สมชาย',
        //     'last_name' => 'ใจดี',
        //     'id_card' => '1231322331230',
        //     'birthdate' => '1988-10-10',
        //     'work_start_date' => '2020-10-10',
        //     'bio' => 'xx',
        //     'email' => 'somchai@x.com',
        //     'password' => '1234',
        //     'work_status' => WorkStatus::PERFORMWORK,
        //     'sort' => 0,
        //     'is_visible' => VisibleStatus::IS_VISIBLE,
        // ]);
    }
}
