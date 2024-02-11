<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
        protected $fillable=['title','description','user_id','date'];
    public function user(){
        return $this->belongsTo(User::class);

    }
     public function newsimage(){
        return $this->hasMany(NewsImage::class);

    }
}
