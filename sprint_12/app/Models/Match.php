<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model {

    use HasFactory;

    protected $guarded = [''];

    public function stadium() {

        return $this->belongsTo(Stadium::class, 'stadium_id', 'id');
    }

    public function scores() {

        return $this->hasMany(Match::class);
    }

    public function team_1() {

        return $this->belongsTo(Team::class, 'team_1', 'id'); //(referenciaModelo, clave_foranea, id_otra_tabla)
    }

    public function team_2() {

        return $this->belongsTo(Team::class, 'team_2', 'id'); //(referenciaModelo, clave_foranea, id_otra_tabla)
    }

}
