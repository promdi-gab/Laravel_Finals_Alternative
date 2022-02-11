<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $table = 'consultations';

    protected $primaryKey = 'consultation_id';

    public function Pet(){
        return $this->belongsTo(Pet::class);
    }

    public function Employee(){
        return $this->belongsTo(Employee::class);
    }
}
