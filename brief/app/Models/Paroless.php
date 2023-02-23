<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Musiques;
class Paroless extends Model
{
    use HasFactory;
    protected $fillable=['paroles','user_id','musiques_id'];


    
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function musiques(){
        return $this->belongsTo(Musiques::class);
    }
}
