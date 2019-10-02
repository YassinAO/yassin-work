<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    protected $fillable = ['title', 'description', 'start_date', 'end_date', 'body', 'cover_image'];
    protected $dates = ['start_date', 'end_date'];
}
