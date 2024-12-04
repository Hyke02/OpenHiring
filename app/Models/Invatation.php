<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Invatation extends Model
{

    protected $fillable = ['user_id', 'vacancy_id', 'status'];

    public function vacancies(): BelongsToMany
    {
//        return $this->belongsToMany(Vacancy::class);
    }
}
