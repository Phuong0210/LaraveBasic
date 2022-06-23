<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturers extends Model
{
    use HasFactory;
    // protected $table = 'manufacturers';
    // public function cars(){
    //     return $this->hasMany('App\Models\Manufacturers','manufacturers_id','id');
    // }
    
    protected $table = 'manufacturers';

    protected $primaryKey = 'id';

    //A car model belongs to a car
    public function Cars() 
    {
        return $this->belongsTo(Car::class);
        
        
    }

}
