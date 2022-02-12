<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $table = 'pets';

    protected $primaryKey = 'pet_id';

    public function owner(){
        return $this->belongsTo('\App\Models\Owner','owner_id');
    }

    public function Consultation(){
        return $this->hasMany(Consultation::class);
    }

}
