<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MyVacancyController extends Controller
{
    public function index(Request $request)
    {
        $vacancies = Vacancy::where('user_id', Auth::user()->id)->get();
//$vacancies = Vacancy::all();
        return view('myVacancy',compact('vacancies'));
    }
}
