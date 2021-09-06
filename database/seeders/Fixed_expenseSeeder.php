<?php

namespace Database\Seeders;

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
                'category_id'=> 123131,
            ]);
            }
    }
}
