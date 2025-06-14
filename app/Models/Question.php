<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {
    protected $table = 'questions';
    protected $fillable = ['question', 'option1', 'option2', 'option3', 'option4', 'correct_option', 'category_id'];
    
    public $timestamps = false;
}
