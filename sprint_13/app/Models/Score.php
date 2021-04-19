<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use App\Models\Encuentro;

class Score extends Model
{
    use HasFactory;
    
    protected $guarded = [''];

    public function team() {

        return $this->belongsTo(Team::class);
    }
    
    public function encuentro() {

        return $this->belongsTo(Encuentro::class, 'match_id', 'id');
    }
}
