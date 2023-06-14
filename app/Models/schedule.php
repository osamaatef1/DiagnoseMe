<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function User(){
        return $this->belongsTo(User::class);

    }
}
