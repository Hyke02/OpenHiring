<?php

namespace App\Http\Controllers;

use App\Models\Invatation;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MyVacancyController extends Controller
{

    public function index()
    {
        $userId = Auth::id(); // Ingelogde gebruiker
        $invitations = Invatation::where('user_id', $userId)->get();

        $vacanciesWithPosition = $invitations->map(function ($invitation) use ($userId) {
            $position = Invatation::where('vacancy_id', $invitation->vacancy_id)
                ->where('created_at', '<=', $invitation->created_at)
                ->count(); // Aantal eerdere inschrijvingen, inclusief de huidige gebruiker

            return [
                'vacancy' => $invitation->vacancy,
                'position' => $position, // Dynamische positie
            ];
        });

        return view('myVacancy', compact('vacanciesWithPosition', 'invitations'));
    }
    }