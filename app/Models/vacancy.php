<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Location;

class vacancy extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    protected $fillable = [

    ];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function location()
    {
        return $this->belongsTo(location::class);
    }


}




