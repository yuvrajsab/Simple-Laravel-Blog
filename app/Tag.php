<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // protected $touches = ["posts"];

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
}
