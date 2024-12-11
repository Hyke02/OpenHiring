<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RandomNameGenerator extends Model
{
    public static function generate(): string
    {
        do {
            $adjective = Word_list::where('word_type', 'adjective')->inRandomOrder()->first();

            $noun = Word_list::where('word_type', 'noun')->inRandomOrder()->first();

            $generatedName = $adjective->word . ' ' . $noun->word;

        } while (User::where('name', $generatedName)->exists());

        return $generatedName;
    }
}
