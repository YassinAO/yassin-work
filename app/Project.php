<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    protected $fillable = ['title', 'description', 'category_id', 'body'];
}
