<?php

namespace App\Http\Controllers;

use App\Models\vacancy;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacancyController extends Controller
{
    // Toon een lijst van vacancy met filter- en zoekmogelijkheden
    public function index(Request $request)
    {
        $sectors = Sector::all();
        $searchTerm = $request->input('search');

        $vacancyQuery = Vacancy::with('user', 'sector');

        if ($searchTerm) {
            $vacancyQuery->where(function ($query) use ($searchTerm) {
                $query->where('vacancy_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('company_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('location', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereHas('user', function ($q) use ($searchTerm) {
                        $q->where('name', 'LIKE', '%' . $searchTerm . '%');
                    });
            });
        }



        if ($request->has('sector') && !empty($request->sector)) {
            $vacancyQuery->where('sector_id', $request->sector);
        }

        $vacancies = $vacancyQuery->get();

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
        $request->validate([
            'vacancy_name' => 'required|string|max:255',
            'sector_id' => 'required|integer',
            'description' => 'required|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('images')) {
            $imagePath = $request->file('images')->store('images/vacancy', 'public');
        }

        vacancy::create([
            'vacancy_name' => $request->vacancy_name,
            'sector_id' => $request->sector_id,
            'description' => $request->description,
            'images' => $imagePath,
            'user_id' => Auth::id(),
            'is_active' => 1,
        ]);

        return redirect()->route('vacancy.index')->with('success', 'Vacature succesvol aangemaakt.');
    }

    // Toon een specifieke vacancy
    public function show($id)
    {
        $vacancy = vacancy::with( 'sector')->findOrFail($id);

        return view('vacancy.show', compact('vacancy'));
    }

    // Formulier voor het bewerken van een bestaande vacancy
    public function edit($id)
    {
        $vacancy = vacancy::findOrFail($id);
        $sectors = Sector::all();

        if ($vacancy->user_id !== Auth::id() && Auth::user()->status != 1) {
            return redirect()->route('vacancy.index')->with('error', 'Je hebt geen toegang om deze vacancy te bewerken.');
        }

        return view('vacancy.edit', compact('vacancy', 'sectors'));
    }

    // Update een bestaande vacancy
    public function update(Request $request, $id)
    {
        $vacancy = vacancy::findOrFail($id);

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
        $vacancy = vacancy::findOrFail($id);

        if ($vacancy->user_id === Auth::id() || Auth::user()->status == 1) {
            $vacancy->delete();
            return redirect()->route('vacancy.index')->with('success', 'Vacature succesvol verwijderd.');
        }

        return redirect()->route('vacancy.index')->with('error', 'Je hebt geen rechten om deze vacancy te verwijderen.');
    }
}
