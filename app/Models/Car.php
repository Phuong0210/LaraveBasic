<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = 'cars';

    protected $primaryKey = 'id';

    protected $fillable = [ 'model','description', 'image','produced_on', 'manufacturers_id'];

    public function Manufacturers()
    {
        return $this->hasMany(Manufacturers::class);
        
    }
} 
