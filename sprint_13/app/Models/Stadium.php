<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Encuentro;
use App\Models\Team;

class Stadium extends Model
{
    use HasFactory;
    protected $table = 'stadiums';
    
    protected $guarded = [''];
    public $timestamps = false;
    
    public function team() {

        return $this->hasOne(Team::class);
    }
    
    public function encuentros() {

        return $this->hasMany(Encuentro::class);
    }
}
