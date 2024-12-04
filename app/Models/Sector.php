<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{



    public function vactures()
    {
        return $this->hasMany(Vacature::class);
    }
}
