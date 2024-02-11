<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable=['title','description','image','user_id'];
    public function user(){
        return $this->belongsTo(User::class);

    }
     public function servicelevel1(){
        return $this->hasMany(ServiceLevel1::class);

    }
}
