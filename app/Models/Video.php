<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    // relacion uno a muchos inversa

    public function user(){

        return $this->belongsTo('App\Models\User');
    }
}
