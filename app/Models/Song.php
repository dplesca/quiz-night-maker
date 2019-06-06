<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = "songs";
    public $fillable = ['artist', 'song', 'start', 'youtube_id', 'duration', 'order', 'round_id'];

    public function round()
    {
        return $this->belongsTo('App\Models\Round');
    }

    public static function addSong($fields){
        $q = new Song($fields);
        $q->order = 0;
        $q->save();

        Song::where('round_id', $fields['round_id'])->increment('order');
    }
}
