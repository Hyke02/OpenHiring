<?php

namespace App\Http\Controllers;

use App\Models\Invatation;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MyVacancyController extends Controller
{
    public function index(Request $request)
    {
        $locations = Location::all();
        $invitations = Invatation::where('user_id', Auth::id())->with('vacancy')->get();

        return view('myVacancy',compact('invitations','locations'));
    }
}
