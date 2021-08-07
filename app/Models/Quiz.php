<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ["id"];

    public function question()
    {
        return $this->hasMany(Question::class,"quiz_id","id");
    }
    
    public function attempt()
    {
        return $this->hasMany(QuizAttempt::class,"quiz_id","id");
    }

    public function result()
    {
        return $this->hasMany(QuizResult::class,"quiz_id","id");
    }

    public function answer()
    {
        return $this->hasMany(Answer::class,"quiz_id","id");
    }
}
