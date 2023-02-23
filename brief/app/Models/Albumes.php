<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Artiste;
use App\Models\Musiques;
class Albumes extends Model
{
    use HasFactory;
    protected $fillable=[
        'title','user_id','img_path','release_date','artiste_id'
    ];
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function artistes(){
        return $this->belongsTo(Artiste::class);
    }
    public function musiques(){
        return $this->hasMany(Musiques::class);
    }
}
