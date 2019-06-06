<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "questions";
    public $fillable = ['question', 'answer', 'round_id', 'order'];

    public function round()
    {
        return $this->belongsTo('App\Models\Round');
    }
    
    public static function addQuestion($fields){
        $q = new Question($fields);
        $q->order = 0;
        $q->save();

        Question::where('round_id', $fields['round_id'])->increment('order');
    }
}
