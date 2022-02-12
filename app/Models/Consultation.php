<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $table = 'consultations';

    protected $primaryKey = 'consultation_id';

    public function pet(){
        return $this->belongsTo('\App\Models\Pet','pet_id');
    }

    public function employee(){
        return $this->belongsTo('\App\Models\Employee','employee_id');
    }
}
