<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    //
    protected $fillable = ['title'];

    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
