<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
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

    public function answer()
    {
        return $this->hasMany(Answer::class,"question_id","id");
    }
}
