<?php

namespace App\Http\Controllers;

use App\Models\Invatation;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;

class InvitationController extends Controller
{
    public function index($vacancyId)
    {
        if (Auth::check()) {
        $userNumber= Auth::user()->number;
            $vacancy = Vacancy::findOrFail($vacancyId);
            $awaitingUsers = $vacancy->awaitingUsers();

            return view('invitation/invitation', compact('vacancy', 'awaitingUsers', 'userNumber'));
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

    public function sendInvitations(Request $request, Vacancy $vacancy)
    {
        $numInvitations = $request->input('num_invitations');
        $message = $request->input('message');

        $waitingEmployees = $vacancy->waitingEmployees()->take($numInvitations)->get();



        foreach ($waitingEmployees as $employee) {
            $invatation = Invatation::where('vacancy_id', $vacancy->id)
                ->where('user_id', $employee->user_id)
                ->first();

            $invatation->update([
                'vacancy_id' => $vacancy->id,
                'user_id' => $employee->user_id,
                'status' => 'pending',
                'message' => $message,
                'date' => now()->format('d-m-Y'),
            ]);
        }

        $vacancy->decrement('awaiting', $numInvitations);

        return redirect()->route('employer.index', $vacancy)->with('success', 'Uitnodigingen verstuurd!');
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

        $invitation = Invatation::findOrFail($request->input('invitation_id'));

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
            return redirect()->back()->with('message', 'Uitnodiging is afgewezen');
        }
        return redirect()->back()->with('error', 'U bent niet geauthorizeerd om deze uitnodiging te verwijderen');


    }
}
