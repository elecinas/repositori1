<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model {

    use HasFactory;
    
    /* protected $table = 'users'; */
    /* protected $fillable = ['first_name', 'last_name', 'email', 'phone_number']; */
    protected $guarded = [''];

    public function position() {

        return $this->belongsTo(Position::class);
    }

}
