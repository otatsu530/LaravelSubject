<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['comment'];

    // $comment->post
    public function thread() {
        return $this->belongsTo('App\Thread');
    }
}
