<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    public function showJobListing()
    {
        $user = Auth::user();

        $vacancies = $user->vacancies;

        $companyName = $vacancies->isEmpty() ? 'No vacancies available' : $vacancies->first()->company_name;



        return view('employer.index', compact('vacancies', 'companyName'));
    }

    public function showJobDetails(Vacancy $vacancy)
    {
        $waitingEmployees = $vacancy->awaiting;

        return view('employer.show', compact('vacancy', 'waitingEmployees'));
    }
}
