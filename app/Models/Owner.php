<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $table = 'owners';

    protected $primaryKey = 'owner_id';
    
    public function Pet(){
        return $this->hasMany(Pet::class);
    }

}
