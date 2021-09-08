<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table= "category";
    public function currentexpenses (){
        return $this->hasMany(Fixed_income::class,'id');

    }

}
