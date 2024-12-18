<?php

namespace App\Http\Controllers;

use App\Models\Invatation;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    public function index($vacancyId)
    {
        $vacancy = Vacancy::findOrFail($vacancyId);


        $awaitingUsers = $vacancy->awaitingUsers();

        return view('invitation/invitation', compact('vacancy', 'awaitingUsers'));
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
//        $invitation = new Invatation();
        $invitation = Invatation::findOrFail($request->input('invitation_id'));

        // als er op accepteer wordt geklikt status gaat naar 1 (accepted) of op afwijzen naar 2(denied)

        if ($request->input('action') === '1') {
            $invitation->status = 'accepted';
        } elseif ($request->input('action') === '2') {
            $invitation->status = 'denied';
        }

        $invitation->date = now()->format('d-m-Y');
        $invitation->save();

        return redirect()->back()->with('message', 'Invitation updated successfully!');

//        $invitation->date=$request->input('date', now()->format('d-m-Y'));
//
//        $invitation->user_id = Auth::user()->id;
//        $invitation->vacancy_id = $request->input('vacancy_id');
//
//        $invitation->save();
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

    public function showInvitation($id)
    {
        $invitation = Invatation::with('vacancy')->findOrFail($id);

        if ($invitation->user_id !== Auth::id() || $invitation->status !== 'pending') {
            abort(403, 'Unauthorized action.');
        }

        return view('invitation.invitation', compact('invitation'));
    }
}
