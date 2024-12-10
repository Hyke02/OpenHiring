<?php

namespace App\Http\Controllers;

use App\Models\Invatation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    public function index()
    {
        return view('invitation/invitation');
    }

    public function store(Request $request)
    {
        $invitation = new Invatation();

        // als er op accepteer wordt geklikt status gaat naar 1 (accepted) of op afwijzen naar 2(denied)

        if ($request->input('action') === '1') {
            $invitation->status = 1;
        } elseif ($request->input('action') === '2') {
            $invitation->status = 2;
        }

        $invitation->date=$request->input('date', now()->format('d-m-Y'));

        $invitation->user_id = Auth::user()->id;
        $invitation->vacancy_id = $request->input('vacancy_id');

        $invitation->save();
    }
}
