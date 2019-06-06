<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    protected $table = "rounds";
    public $fillable = ['title', 'quiz_id', 'type'];

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    public function songs()
    {
        return $this->hasMany('App\Models\Song');
    }

    public function quiz()
    {
        return $this->belongsTo('App\Models\Quiz');
    }

}
