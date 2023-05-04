<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //relacion uno a muchos inversa

    public function user(){

        return $this->belongsTo('App\Models\User');
    }


    //relacion poliformica

    public function commentable(){
        return $this->morphTo(); // relacion para una tabla polimorfica
    }
}
