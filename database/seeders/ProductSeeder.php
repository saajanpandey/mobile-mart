<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Products::truncate();
        $area2 = Products::where('id', 1)->first();
        if (!isset($area2)) {
            Products::create([
                'id' => 1,
                'name' => 'MI A2',
                'description' => 'phone',
                'price' => 30000,
            ]);
        }
    }
}
