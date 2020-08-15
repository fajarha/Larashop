<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    //mereleasi table categories dengan book

    public function books()
    {
        return $this->belongsToMany('App\Book');
    }
}
