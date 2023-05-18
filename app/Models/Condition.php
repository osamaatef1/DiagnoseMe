<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    use HasFactory;

    protected $table = "condition";
    protected $guarded =[];

    public function symptoms(){
        return $this->belongsToMany(Symptom::class , 'condition_symptoms');
    }
}
