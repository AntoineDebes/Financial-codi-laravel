<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixed_income extends Model
{
    use HasFactory;

    protected $table= "fixed_incomes";
    public function categories(){
        return $this->belongsTo(Category::class, 'id');
    }
}
