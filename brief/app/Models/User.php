<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Http\Artiste;
use App\Models\Http\Albumes;
use App\Models\Http\Paroles;
use App\Models\Http\Musiques;
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
    public function artistes(){
        return $this->hasMany(Artiste::class);
    }
    public function musiques(){
        return $this->hasMany(Musiques::class);
    }
    public function albumes(){
        return $this->hasMany(Albumes::class);
    }
    public function paroles(){
        return $this->hasMany(Paroles::class);
    }
}
