<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Albumes;
use App\Models\Paroles;
class Musiques extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'user_id',
        'albume_id'
    ];
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function albumes(){
        return $this->belongsTo(Albumes::class);
    }
    public function paroles(){
        return $this->hasOne(Paroles::class);
    }
}
