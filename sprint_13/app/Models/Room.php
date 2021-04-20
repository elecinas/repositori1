<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Costumer;

class Room extends Model
{
    use HasFactory;
    protected $guarded = [''];
    
    public function costumers() 
    {
        return $this->belongsToMany(Costumer::class)->withPivot('dia_reserva');
    }
}
