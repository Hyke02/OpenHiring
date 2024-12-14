<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class InvatationNew extends Model
{

    protected $fillable = ['user_id', 'vacancy_id', 'status'];

    public function vacancy(): BelongsTo
    {
        return $this->belongsTo(VacancyNew::class);
    }
}
