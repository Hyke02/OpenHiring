<?php

namespace App\Http\Controllers;

use App\Models\Vacature;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacaturesController extends Controller
{
    // Toon een lijst van vacatures met filter- en zoekmogelijkheden
    public function index(Request $request)
    {
        $sectors = Sector::all();
        $searchTerm = $request->input('search');

        $vacaturesQuery = Vacature::with('user', 'sector');

        if ($searchTerm) {
            $vacaturesQuery->where(function ($query) use ($searchTerm) {
                $query->where('vacature_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('bedrijf_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('location', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereHas('user', function ($q) use ($searchTerm) {
                        $q->where('name', 'LIKE', '%' . $searchTerm . '%');
                    });
            });
        }



        if ($request->has('sector') && !empty($request->sector)) {
            $vacaturesQuery->where('sector_id', $request->sector);
        }

        $vacatures = $vacaturesQuery->where('is_active', 1)->get();

        return view('vacatures.index', compact('sectors', 'vacatures'));
    }

    // Formulier voor het aanmaken van een nieuwe vacature
    public function create()
    {
        $sectors = Sector::all();
        return view('vacatures.create', compact('sectors'));
    }

    // Opslaan van een nieuwe vacature
    public function store(Request $request)
    {
        $request->validate([
            'vacature_name' => 'required|string|max:255',
            'sector_id' => 'required|integer',
            'description' => 'required|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('images')) {
            $imagePath = $request->file('images')->store('images/vacatures', 'public');
        }

        Vacature::create([
            'vacature_name' => $request->vacature_name,
            'sector_id' => $request->sector_id,
            'description' => $request->description,
            'images' => $imagePath,
            'user_id' => Auth::id(),
            'is_active' => 1,
        ]);

        return redirect()->route('vacatures.index')->with('success', 'Vacature succesvol aangemaakt.');
    }

    // Toon een specifieke vacature
    public function show($id)
    {
        $vacature = Vacature::with('user', 'sector')->findOrFail($id);

        return view('vacatures.show', compact('vacature'));
    }

    // Formulier voor het bewerken van een bestaande vacature
    public function edit($id)
    {
        $vacature = Vacature::findOrFail($id);
        $sectors = Sector::all();

        if ($vacature->user_id !== Auth::id() && Auth::user()->status != 1) {
            return redirect()->route('vacatures.index')->with('error', 'Je hebt geen toegang om deze vacature te bewerken.');
        }

        return view('vacatures.edit', compact('vacature', 'sectors'));
    }

    // Update een bestaande vacature
    public function update(Request $request, $id)
    {
        $vacature = Vacature::findOrFail($id);

        if ($vacature->user_id !== Auth::id() && Auth::user()->status != 1) {
            return redirect()->route('vacatures.index')->with('error', 'Je hebt geen rechten om deze vacature te bewerken.');
        }

        $request->validate([
            'vacature_name' => 'required|string|max:255',
            'sector_id' => 'required|integer',
            'description' => 'required|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $vacature->images;

        if ($request->hasFile('images')) {
            $imagePath = $request->file('images')->store('images/vacatures', 'public');
        }

        $vacature->update([
            'vacature_name' => $request->vacature_name,
            'sector_id' => $request->sector_id,
            'description' => $request->description,
            'images' => $imagePath,
        ]);

        return redirect()->route('vacatures.index')->with('success', 'Vacature succesvol bijgewerkt.');
    }

    // Verwijder een vacature
    public function destroy($id)
    {
        $vacature = Vacature::findOrFail($id);

        if ($vacature->user_id === Auth::id() || Auth::user()->status == 1) {
            $vacature->delete();
            return redirect()->route('vacatures.index')->with('success', 'Vacature succesvol verwijderd.');
        }

        return redirect()->route('vacatures.index')->with('error', 'Je hebt geen rechten om deze vacature te verwijderen.');
    }
}
