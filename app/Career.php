<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    protected $fillable = ['title', 'description', 'body'];
}
