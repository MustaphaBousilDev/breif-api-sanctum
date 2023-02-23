<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Albumes;
class Artiste extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','user_id'
    ];
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function albumes(){
        return $this->hasMany(Albumes::class);
    }
}
