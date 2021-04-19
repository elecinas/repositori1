<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stadium;
use App\Models\Score;
use App\Models\Team;
use App\Models\Encuentro;

class Encuentro extends Model {

    use HasFactory;

    protected $guarded = [''];
    protected $table = 'matches';

    public function stadium() {

        return $this->belongsTo(Stadium::class, 'stadium_id', 'id');
    }

    public function scores() {

        return $this->hasMany(Score::class, 'match_id');
    }

    public function local() {
        return $this->belongsTo(Team::class, 'team_1', 'id');
        /*return $this->belongsToMany(Team::class, 'matches', 'team_1', 'team_2');*/
    }

    public function visitante() {
        return $this->belongsTo(Team::class, 'team_2', 'id');
        /*return $this->belongsToMany(Team::class, 'matches', 'team_2', 'team_1');*/
    }

}