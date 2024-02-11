<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fleet extends Model
{
    use HasFactory;
   protected $fillable=['title','image','user_id'];
    public function fletlevel(){
        return $this->hasMany(FleetLevel1::class,'fleet_id');

    }
}
