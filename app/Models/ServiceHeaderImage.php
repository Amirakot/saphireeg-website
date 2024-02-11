<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceHeaderImage extends Model
{
    use HasFactory;
  protected $fillable=['image','service_level1_id'];
    public function servicelevel1(){
        return $this->belongsTo(ServiceLevel1::class,'service_level1_id');
    }
}
