<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Vacancy extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    protected $fillable = [

    ];

    public function sector(): BelongsTo
    {
        return $this->belongsTo(SectorNew::class);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(LocationNew::class, 'location_id');
    }

    public function invitations(): HasMany
    {
        return $this->hasMany(InvatationNew::class);
    }

}




