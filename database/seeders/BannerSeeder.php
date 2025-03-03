<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create([
            'name' => 'วิทยาลัยสงฆ์ราชบุรี',
            'description' => 'ระบบเทคโนโลยีสารสนเทศ (e-Office)',
            'summary' => 'มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย',
        ]);
    }
}
