<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixed_expense extends Model
{
    use HasFactory;

    protected $table= "fixed_expenses";
    public function categories(){
        return $this->belongsTo(Category::class, 'id');
    }
}
