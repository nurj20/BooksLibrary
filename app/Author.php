<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $guarde=[];

    public function books(){
        return $this->hasMany(\App\Book::class);
    }
}
