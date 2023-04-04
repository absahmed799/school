<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolStudent extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'phone',
        'email',
        'adresse',
        'date_naissance',
        'ville_id'
    ];

    public function studentHasCity(){
        return $this->hasOne('App\Models\SchoolCity', 'id', 'ville_id');
    }
}
