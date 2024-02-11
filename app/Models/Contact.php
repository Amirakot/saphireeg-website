<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
     protected $fillable=['user_id'];
    public function address(){
        return $this->hasMany(address::class);

    }
      public function email(){
        return $this->hasMany(Email::class);

    }
      public function phone(){
        return $this->hasMany(Phone::class);

    }
}
