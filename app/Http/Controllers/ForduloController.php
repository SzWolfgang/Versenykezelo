<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fordulo;
use App\Models\Verseny;
use App\Models\Felhasznalo;
use App\Models\Versenyzo;

class ForduloController extends Controller
{
    public function create()
    {
        $versenyek = Verseny::select('nev', 'ev')->get();
        return view('create', compact('versenyek'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'verseny_nev' => 'required|string',
            'verseny_ev' => 'required|integer',
            'nev' => 'required|string|max:100',
            'kezdes_idopont' => 'required|date',
            'zaras_idopont' => 'required|date|after:kezdes_idopont',
        ]);
    
        try {
            Fordulo::create([
                'verseny_nev' => $validated['verseny_nev'],
                'verseny_ev' => $validated['verseny_ev'],
                'nev' => $validated['nev'],
                'kezdes_idopont' => $validated['kezdes_idopont'],
                'zaras_idopont' => $validated['zaras_idopont'],
            ]);
    
            return response()->json(['success' => 'Forduló sikeresen hozzáadva!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hiba történt a forduló hozzáadása közben: ' . $e->getMessage()], 500);
        }
    }
    

   
}
