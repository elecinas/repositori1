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

    public function team_1() {

        return $this->belongsTo(Team::class, 'team_1', 'id'); //(referenciaModelo, clave_foranea, id_otra_tabla)
    }

    public function team_2() {

        return $this->belongsTo(Team::class, 'team_2', 'id'); //(referenciaModelo, clave_foranea, id_otra_tabla)
    }

}
