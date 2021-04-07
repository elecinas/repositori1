<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use App\Models\Match;

class Score extends Model
{
    use HasFactory;
    
    protected $guarded = [''];

    public function team() {

        return $this->belongsTo(Team::class);
    }
    
    public function match() {

       // return $this->belongsTo(Match::class);
    }
}
