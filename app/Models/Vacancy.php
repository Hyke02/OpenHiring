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
    protected $fillable = ['name', 'company_name', 'user_id', 'awaiting'];


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
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function invitations(): HasMany
    {
        return $this->hasMany(Invatation::class, 'vacancy_id');
    }

    public function waitingEmployees()
    {
        return $this->hasMany(Invatation::class)
            ->where('status', 'awaiting')
            ->with('user');
    }

    public function sendInvitations($userIds)
    {

        foreach ($userIds as $userId) {
            Invatation::create([
                'vacancy_id' => $this->id,
                'user_id' => $userId,
                'status' => 'pending',
                'date' => now()->format('d-m-Y'),
            ]);
        }
    }

}




