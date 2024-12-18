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
        $userId = Auth::id();
        $invitations = Invatation::where('user_id', $userId)
            ->whereIn('status', ['pending', 'awaiting'])
            ->with('vacancy')
            ->get();

        $vacanciesWithDetails = $invitations->map(function ($invitation) {
            $position = Invatation::where('vacancy_id', $invitation->vacancy_id)
                ->where('created_at', '<=', $invitation->created_at)
                ->count();

            return [
                'vacancy' => $invitation->vacancy,
                'position' => $position,
                'invitation' => $invitation,
            ];
        });

        return view('myVacancy', compact('vacanciesWithDetails'));

//        $userId = Auth::id();
//        $invitations = Invatation::where('user_id', $userId)
//            ->where('status', 'pending')
//            ->with('vacancy')
//            ->get();
//
//        $vacanciesWithPosition = $invitations->map(function ($invitation) use ($userId) {
//            $position = Invatation::where('vacancy_id', $invitation->vacancy_id)
//                ->where('created_at', '<=', $invitation->created_at)
//                ->count();
//
//            return [
//                'vacancy' => $invitation->vacancy,
//                'position' => $position,
//                'invitation' => $invitation,
//            ];
//        });
//
//        return view('myVacancy', compact('vacanciesWithPosition', 'invitations'));
    }
}
