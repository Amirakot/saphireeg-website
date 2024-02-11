<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceLevel1Image extends Model
{
    use HasFactory;
     protected $fillable=['image','service_level1_id'];
    // public function user(){
    //     return $this->belongsTo(User::class);

    // }
     public function servicelevel1(){
        return $this->belongsTo(ServiceLevel1::class);

    }
}
