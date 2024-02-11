<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable=['title','description','image','user_id'];
    public function user(){
        return $this->belongsTo(User::class);

    }
     public function aboutlevel1(){
        return $this->hasMany(AboutLevel1::class);
    }
}
