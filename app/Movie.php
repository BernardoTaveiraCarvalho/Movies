<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function genres(){
        return $this->belongsToMany(Genre::class);
    }
    public function actors(){
        return $this->belongsToMany(Actor::class);
    }
    protected $fillable = ['title','year','realeased','runtime','director','imdb_votes'];
}
