<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function index()
    {
        return view('invitation/invitation');
    }

    public function store(Request $request)
    {
        $invitation = new Invitation();

        // als er op accepteer wordt geklikt status gaat naar 1 (accepted) of op afwijzen naar 2(denied)
        if (isset($_POST['accept_button'])) {
            $invitation->status = 1;
        } else if (isset($_POST['deny_button'])) {
            $invitation->status = 2;
        }
    }
}
