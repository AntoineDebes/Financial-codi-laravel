<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\support\Str;
use App\Models\Fixed_expense;

class Fixed_expenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++){
            Fixed_expense::create([
                'title' => Str::random(10),
                'quantity' => 10,
                'description' => Str::random(10),
                'currency'=> '$',
                'category_id' => Category::all()->random()->id,
                "category_title" => Category::all()->random()->title,
                'date' => '2021-09-02',
            ]);
            }
    }
}
