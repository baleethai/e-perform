<?php

namespace Database\Seeders;

use App\Models\PortfolioType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PortfolioType::create([
            'name' => 'ภาระงานหลัก',
            'is_visible' => true,
        ]);
        PortfolioType::create([
            'name' => 'ภาระงานรอง',
            'is_visible' => true,
        ]);
        PortfolioType::create([
            'name' => 'ภาระงานมอบหมาย',
            'is_visible' => true,
        ]);
    }
}
