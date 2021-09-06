<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Current_expense;
use App\Models\Category;
use Illuminate\support\Str;

class Current_expenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for($i=0;$i<10;$i++){
        //     Current_expense::create([
        //         'title' => Str::random(10),
        //         'quantity' => 10,
        //         'description' => Str::random(10),
        //         'currency'=> '$',
        //     ]);
        //     }
        $faker = Faker\Factory::create();
            foreach (range(1,50) as $index) {
                Current_expense::create([
                'title' => $faker->word,
                'quantity' => $faker->randomDigit,
                'description' => $faker->word,
                'category_id'=> $faker->randomDigit

                ]);
            }
    }
}
