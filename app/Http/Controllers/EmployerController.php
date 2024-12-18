<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    public function showJobListings()
    {
        $user = Auth::user();

        $vacancies = $user->vacancies;

        $companyName = $vacancies->isEmpty() ? 'No vacancies available' : $vacancies->first()->company_name;



        return view('employer.index', compact('vacancies', 'companyName'));
    }
}
