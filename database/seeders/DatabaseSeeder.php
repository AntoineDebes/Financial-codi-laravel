<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(Current_expenseSeeder::class);
        $this->call(Current_incomeSeeder::class);
        $this->call(Fixed_expenseSeeder::class);
        $this->call(Fixed_incomeSeeder::class);
        $this->call(ProductSeeder::class);

    }
}
