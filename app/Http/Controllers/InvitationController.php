<?php

namespace App\Http\Controllers;

use App\Models\Invatation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;

class InvitationController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
        $userNumber= Auth::user()->number;
        return view('invitation/invitation', compact('userNumber'));
        } else {
            return view('auth.login');
        }
    }

    private function sendMessage($message, $recipient)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipient,
            ['from' => $twilio_number, 'body' => $message] );
    }

    public function store(Request $request)
    {
        // custom messsage SMS
        $validatedData = $request->validate([
            'users' => 'required',
            'body' => 'required',
        ]);

        $recipient = $validatedData["users"];

//         iterate over the array of recipients and send a twilio request for each

        $this->sendMessage($validatedData["body"], $recipient);

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
        return redirect()->route('vacancy.index')->with('success', 'Succesvol ingeschreven.');
    }

    public function destroy($id)
    {
        $invitation = Invatation::findOrFail($id);

        if ($invitation->user_id === Auth::user()->id) {
            $invitation->delete();
            return redirect()->back();
        }
        return redirect()->back();
    }
}
