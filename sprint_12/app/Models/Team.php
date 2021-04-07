<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model {

    use HasFactory;

    protected $guarded = [''];

    public function stadium() {

        return $this->belongsTo(Stadium::class, 'stadium_id', 'id');
    }

    public function matches() {

        return $this->hasMany(Match::class);
    }
    
    public function scores() {

        return $this->hasMany(Score::class);
    }
}
