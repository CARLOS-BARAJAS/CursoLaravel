<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use App\Models\Profile; en casopida retornar la clase(Profile::class);

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){

        // $profile = Profile::where('user_id', $this->id)->first(); es lo mismo
        // en caso no le pongas nombre user_id se debe especificar el campo a referencia 
        //, 'App\Models\Profile', foreing_key, local_key seria nombre de la llave primaria
        //RELACION ONE ON ONE
        return $this->hasOne('App\Models\Profile');

    }

    // Relacion uno a muchos a nivel de eloke

    public function posts(){

        return $this->hasMany('App\Models\Post');
    }

    public function videos(){

        return $this->hasMany('App\Models\Videos');
    }


}
