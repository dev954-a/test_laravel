<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title','description','user_id'
    ];

    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
