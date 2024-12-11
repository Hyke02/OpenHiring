<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word_list extends Model
{
    protected $fillable = ['word_type', 'word'];

    protected $table = 'word_lists';
}
