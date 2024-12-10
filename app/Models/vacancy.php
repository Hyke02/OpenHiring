<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class vacancy extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    protected $fillable = [

    ];

    public function sector(): BelongsTo
    {
        return $this->belongsTo(Sector::class);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(location::class, 'location_id');
    }

    public function invitation(): HasMany
    {
        return $this->hasMany(Invatation::class);
    }

}




