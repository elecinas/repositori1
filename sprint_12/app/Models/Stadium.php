<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    use HasFactory;
    
    protected $guarded = [''];
    
    public function team() {

        return $this->hasOne(Team::class);
    }
    
    public function matches() {

        return $this->hasMany(Match::class);
    }
}
