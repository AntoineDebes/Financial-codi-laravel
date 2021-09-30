<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Current_income;
use Illuminate\support\Str;

class Current_incomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++){
            Current_income::create([
                'title' => Str::random(10),
                'quantity' => 10,
                'description' => Str::random(10),
                'currency'=> '$',
                'category_id' => Category::all()->random()->id,
                'date' => '2021-09-02',
            ]);
        }
    }
}
