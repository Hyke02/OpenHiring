<?php

namespace App\Http\Controllers;

use App\Models\Invatation;
use App\Models\Location;
use App\Models\Vacancy;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class VacancyController extends Controller
{
    // Toon een lijst van vacancy met filter- en zoekmogelijkheden
    public function index(Request $request)
    {
        $sectors = Sector::all();
        $searchTerm = $request->input('search');

        // Start de query met de benodigde relaties
        $vacancyQuery = Vacancy::with('user', 'sector', 'location');

        if ($searchTerm) {
            $vacancyQuery->where(function ($query) use ($searchTerm) {
                $query->where('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('company_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereHas('location', function($q) use ($searchTerm) {
                        $q->where('name', 'LIKE', '%' . $searchTerm . '%');
                    });
            });
        }

        // Als er een sector is geselecteerd, voeg deze filter toe
        if ($request->has('sector') && !empty($request->sector)) {
            $vacancyQuery->where('sector_id', $request->sector);
        }

        // Haal de vacatures op
        $vacancies = $vacancyQuery->paginate(10);

        return view('vacancy.index', compact('sectors', 'vacancies'));
    }

    // Formulier voor het aanmaken van een nieuwe vacancy
    public function create()
    {
        $sectors = Sector::all();
        return view('vacancy.create', compact('sectors'));
    }

    // Opslaan van een nieuwe vacancy
    public function store(Request $request)
    {
        $validated = $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//            'media' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'job_title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'hours' => 'required|integer|max:50',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
            'sector_id' => 'required|exists:sectors,id',
            'wanted' => 'required|integer|max:255',
            'awaiting' => 'required|integer',
            'requirements' => 'required|string|max:1000',
            'description' => 'required|string|max:1000',
            'offers' => 'required|string|max:1000',
        ]);

        // Opslaan van het logo
        if ($request->hasFile('logo')) {
            $imagePath2 = $request->file('logo')->store('/images/logo', 'public');
        }

         //Opslaan van de media (vacaturefoto)
        if ($request->hasFile('media')) {
            $imagePath = $request->file('media')->store('/images/media', 'public');
        }

        $location = Location::firstOrCreate(
            ['name' => $validated['location']],
            ['name' => $validated['location']]
        );

        $vacancy = new Vacancy();
        $vacancy->logo = $imagePath2;
        $vacancy->media = $imagePath;
        $vacancy->job_title =$request->input('job_title');
        $vacancy->company_name =$request->input('company_name');
        $vacancy->hours =$request->input('hours');
        $vacancy->location_id = $location->id;
        $vacancy->salary =$request->input('salary');
        $vacancy->sector_id =$request->input('sector_id');
        $vacancy->wanted =$request->input('wanted');
        $vacancy->awaiting =$request->input('awaiting');
        $vacancy->requirements =$request->input('requirements');
        $vacancy->description =$request->input('description');
        $vacancy->offers =$request->input('offers');
        $vacancy->user_id = auth()->user()->id;
        $vacancy->save();

        return redirect()->route('vacancy.index')->with('success', 'Vacature succesvol aangemaakt.');
    }

    // user_id en vancacy_id in invatation tabel wordt gelinked
    public function storeUser_id(Request $request)
    {
        $invatation = new Invatation();
        $invatation->user_id = Auth::id();
        $invatation->vacancy_id = $request->vacancy_id;

        $invatation->save();
        return redirect()->route('my-vacancy.index');
    }

    // Toon een specifieke vacancy
    public function show($id, Request $request)
    {
        $vacancy = Vacancy::with( 'sector')->findOrFail($id);
        $invitations = Auth::check()
            ? Invatation::where('user_id', Auth::user()->id)->get()
            : collect();

        $fromMyVacancy = $request->query('from') === 'my-vacancy';

        return view('vacancy.show', compact('vacancy','invitations','fromMyVacancy'));
    }


    // Formulier voor het bewerken van een bestaande vacancy
    public function edit($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $sectors = Sector::all();

        if ($vacancy->user_id !== Auth::id() && Auth::user()->status != 1) {
            return redirect()->route('vacancy.index')->with('error', 'Je hebt geen toegang om deze vacancy te bewerken.');
        }

        return view('vacancy.edit', compact('vacancy', 'sectors'));
    }

    // Update een bestaande vacancy
    public function update(Request $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);

        if ($vacancy->user_id !== Auth::id() && Auth::user()->status != 1) {
            return redirect()->route('vacancy.index')->with('error', 'Je hebt geen rechten om deze vacancy te bewerken.');
        }

        $request->validate([
            'vacancy_name' => 'required|string|max:255',
            'sector_id' => 'required|integer',
            'description' => 'required|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $vacancy->images;

        if ($request->hasFile('images')) {
            $imagePath = $request->file('images')->store('images/vacancy', 'public');
        }

        $vacancy->update([
            'vacancy_name' => $request->vacancy_name,
            'sector_id' => $request->sector_id,
            'description' => $request->description,
            'images' => $imagePath,
        ]);

        return redirect()->route('vacancy.index')->with('success', 'Vacature succesvol bijgewerkt.');
    }

    // Verwijder een vacancy
    public function destroy($id)
    {
        $vacancy = Vacancy::findOrFail($id);

        if ($vacancy->user_id === Auth::id() || Auth::user()->status == 1) {
            $vacancy->delete();
            return redirect()->route('vacancy.index')->with('success', 'Vacature succesvol verwijderd.');
        }

        return redirect()->route('vacancy.index')->with('error', 'Je hebt geen rechten om deze vacancy te verwijderen.');
    }
}
