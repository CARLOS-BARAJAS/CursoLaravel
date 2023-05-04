<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // relacion uno a muchos pero inversa

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function categoria(){

        return $this->belongsTo('App\Models\Categoria');
    }

    //relacion uno a uno polimorfica

    public function image(){ // recuperar la imagen
        return $this->morphOne('App\Models\Image','imageable'); // relacion one a one es morpOne
    // se pasar dos parametros la url donde se encuentra el modelo y el metodo que se conectar para recuperar los registros
    }

    //relacion uno a muchos polimorfica

    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commentable');

    }
}