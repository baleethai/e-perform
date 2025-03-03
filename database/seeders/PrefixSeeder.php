<?php

namespace Database\Seeders;

use App\Models\Prefix;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrefixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prefix::create([
            'name' => 'นาย'
        ]);
        Prefix::create([
            'name' => 'นาง'
        ]);
        Prefix::create([
            'name' => 'นางสาว'
        ]);
        Prefix::create([
            'name' => 'พระ'
        ]);
        Prefix::create([
            'name' => 'พระมหา'
        ]);
        Prefix::create([
            'name' => 'สามเณร'
        ]);
    }
}
