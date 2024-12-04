<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vacancy extends Model
{
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




}




