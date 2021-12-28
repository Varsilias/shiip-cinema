<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded=[];

    public function cinema()
    {
        return $this->belongsToMany('App\Cinema', 'cinemas_movies', 'movie_id', 'cinema_id')->withPivot('time', 'date');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
