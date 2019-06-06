<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    //
    protected $table = "nights";

    public function rounds()
    {
        return $this->hasMany('App\Models\Round');
    }
}
