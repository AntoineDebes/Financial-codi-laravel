<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Current_income extends Model
{
    use HasFactory;

    protected $table= "current_incomes";
    public function categories(){
        return $this->belongsTo(Category::class, 'id');
    }
}
