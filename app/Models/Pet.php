<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $table = 'pets';

    protected $primaryKey = 'pet_id';

    public function Owner(){
        return $this->belongsTo(Owner::class);
    }

}
