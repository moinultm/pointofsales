<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsPost extends Model
{

    public  function  categories(){
        return $this->belongsToMany('App\Category');
    }

    public  function  areas(){
        return $this->belongsToMany('App\Area');
    }


}
