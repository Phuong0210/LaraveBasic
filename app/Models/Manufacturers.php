<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Manufacturers extends Model
{
    use HasFactory;
    protected $table='manufacturers';
    protected $fillable=['name'];
    public function cars(){
        return $this->hasMany(Car::class,'manufacturers_id','id');
    }
    // protected $table = 'manufacturers';
    // public function cars(){
    //     return $this->hasMany('App\Models\Manufacturers','manufacturers_id','id');
    // }
    
    // protected $table = 'manufacturers';

    // protected $primaryKey = 'id';

    // //A car model belongs to a car
    // public function Cars() 
    // {
    //     return $this->hasMany(Car::class);
        
        
    // }

}
