<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::truncate();
        $area1 = Brand::where('id', 1)->first();
        if (!isset($area1)) {
            Brand::create([
                'id' => 1,
                'name' => 'Apple',
            ]);
        }
        $area2 = Brand::where('id', 2)->first();
        if (!isset($area2)) {
            Brand::create([
                'id' => 2,
                'name' => 'Xiaomi',
            ]);
        }
    }
}
