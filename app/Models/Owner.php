<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $table = 'owners';

    protected $primaryKey = 'owner_id';

    //protected $fillable = ['first_name','last_name','phone_number','owner_pic'];
}
