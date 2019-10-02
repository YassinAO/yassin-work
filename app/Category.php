<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function projects(){
        return $this->hasMany('App\Project');
    }

    protected $fillable = ['title'];
}
