<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;

class Costumer extends Model
{
    use HasFactory;
    protected $guarded = [''];
    
    public function rooms() 
    {
        return $this->belongsToMany(Room::class)
                ->withPivot('id')
                ->withPivot('dia_reserva')
                ->withTimestamps();
    }
}
