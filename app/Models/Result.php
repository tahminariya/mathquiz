<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['user_id', 'category_id', 'score'];

    public function category()
    { 
        return $this->belongsTo(Category::class, 'category_id', 'id'); 
    }
}
