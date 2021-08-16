<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\support\Str;
use App\Models\Admins;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++){
            Admins::create([
                'name' => Str::random(10),
                'email'=> Str::random(10).'@gmail.com',
                'password' => 'tist',
                'verified'=> true,
                'token'=> 'asdasdada',
                'admin'=> false,
            ]); 
        }
    }
}
