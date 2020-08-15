<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //merelasi table categories dan book
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
