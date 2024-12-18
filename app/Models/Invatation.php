<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Invatation extends Model
{

    protected $fillable = ['user_id', 'vacancy_id', 'status', 'date', 'message'];

    public function vacancy(): BelongsTo
    {
        return $this->belongsTo(Vacancy::class, 'vacancy_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
