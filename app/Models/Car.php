<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Manufacturers;

// class Car extends Model
// {
//     use HasFactory;
//     protected $table = 'cars';

//     protected $primaryKey = 'id';

//     protected $fillable = [ 'model','description', 'image','produced_on', 'manufaturers_id'];

//     public function Manufacturers()
//     {
//         return $this->belongsTo(Manufacturers::class);
        
//     }
// } 
class Car extends Model
{
    use HasFactory;
     protected $table = "cars";
     protected $fillable=['model','description', 'image','produced_on', 'manufaturers_id'];
    public function manufacturer(){
        return $this->belongsTo(Manufacturers::class,'manufaturers_id','id');

    }
}