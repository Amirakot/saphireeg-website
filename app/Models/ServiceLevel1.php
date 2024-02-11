<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceLevel1 extends Model
{
    use HasFactory;
     protected $fillable=['title','description','service_id'];
    public function service(){
        return $this->belongsTo(Service::class);

    }
     public function serviceimage(){
        return $this->hasMany(ServiceLevel1Image::class);

    }
     public function servicelevel2(){
        return $this->hasMany(ServiceLevel2::class,'service_level1_id');

    }
       public function serviceheader(){
        return $this->hasMany(ServiceHeaderImage::class,'service_level1_id');

    }
}
