<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Encuentro;
use App\Models\Stadium;
use App\Models\Score;

class Team extends Model {

    use HasFactory;

    protected $guarded = [''];
    
    public function encuentros1() {

        return $this->hasMany(Encuentro::class, 'team_1');
    }
    
    public function encuentros2() {

        return $this->hasMany(Encuentro::class, 'team_2');
    }

    public function stadium() {

        return $this->belongsTo(Stadium::class, 'stadium_id', 'id');
    }
    
    public function scores() {

        return $this->hasMany(Score::class);
    }
}
