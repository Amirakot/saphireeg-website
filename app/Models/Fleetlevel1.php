<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fleetlevel1 extends Model
{
    use HasFactory;
       protected $fillable=['title','description','image','fleet_id'];
    public function fleet(){
        return $this->belongsTo(Fleet::class,'fleet_id');

    }
}
