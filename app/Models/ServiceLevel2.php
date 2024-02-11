<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceLevel2 extends Model
{
    use HasFactory;
     protected $fillable=['title','description','service_level1_id'];
    // public function user(){
    //     return $this->belongsTo(User::class);

    // }
     public function servicelevel1(){
        return $this->belongsTo(ServiceLevel1::class,'service_level1_id');

    }
}
