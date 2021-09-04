<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table= "categories";
    public function currentexpenses(){
        return $this->hasMany(Current_expense::class,'id');
    }

}
