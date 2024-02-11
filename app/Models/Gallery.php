<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
        protected $fillable=['image','user_id','title'];
    public function user(){
        return $this->belongsTo(User::class);

    }
    //  public function futureimage(){
    //     return $this->hasMany(FutureImage::class);

    // }
}
