<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Costumer;
use App\Models\Floor;

class Room extends Model
{
    use HasFactory;
    protected $guarded = [''];
    
    public function costumers() 
    {
        return $this->belongsToMany(Costumer::class)
                ->withPivot('id')
                ->withPivot('dia_reserva');
    }
    
    public function floor() 
    {
        return $this->belongsTo(Floor::class);
    }
}
