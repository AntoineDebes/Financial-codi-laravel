<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<30;$i++){
            Product::create([
                'title' => Str::random(10),
                'quantity' => 10,
                'description' => Str::random(10),
                'currency'=> '$',
                'category'=> 'test',
            ]);
            }
    }
}
