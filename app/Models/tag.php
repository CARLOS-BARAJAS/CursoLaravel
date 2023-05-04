<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use HasFactory;

    //Realcion muchos a muchos Inversa polimorfica

    public function posts(){
        return $this->morphedByMany('App\Models\Post', 'taggable');
        
    }

    public function videos(){
        return $this->morphedByMany('App\Models\Video', 'taggable');
        
    }
}
