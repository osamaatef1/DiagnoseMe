<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function conditions(){
        return $this->belongsToMany(Condition::class , 'condition_symptoms');
    }
}
