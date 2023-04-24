<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;


    Public function user(){
        //$user = User::find($this->user_id); belongsTo hace lo
        //mismo de este campo busca user por su id returna sus datos
        return $this->belongsTo('App\Models\User');
    }
}
