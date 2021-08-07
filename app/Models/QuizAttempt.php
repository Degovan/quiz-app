<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAttempt extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ["id"];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class,"quiz_id","id");
    }

    public function user()
    {
        return $this->belongsTo(User::class,"user_id","id");
    }
}
