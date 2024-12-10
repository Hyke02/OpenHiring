<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


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


}




