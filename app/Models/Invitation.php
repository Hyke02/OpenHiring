<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Invitation extends Model
{
    public function vacancies(): BelongsToMany
    {
//        return $this->belongsToMany(Vacancy::class);
    }
}
