<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Verseny;
use App\Models\Fordulo;
use App\Models\Felhasznalo;
use App\Models\Versenyzo;
use Illuminate\Database\QueryException;

class VersenyController extends Controller
{
    public function index()
    {
        $versenyek = Verseny::with('fordulok')->get();

        return view('verseny-lista', compact('versenyek'));
    }
    public function store(Request $request)
{
    $validated = $request->validate([
        'nev' => 'required|string|max:100',
        'ev' => 'required|integer|digits:4',
        'elerheto_nyelvek' => 'required|string|max:100',
        'pontko_jo' => 'nullable|integer',
        'pontok_rossz' => 'nullable|integer',
        'pontok_ures' => 'nullable|integer',
    ]);

    $existingVerseny = Verseny::where('nev', $validated['nev'])
                              ->where('ev', $validated['ev'])
                              ->first();

    if ($existingVerseny) {
        return response()->json(['error' => 'Ez a verseny már létezik!'], 400);
    }

    try {
        Verseny::create([
            'nev' => $validated['nev'],
            'ev' => $validated['ev'],
            'elerheto_nyelvek' => $validated['elerheto_nyelvek'],
            'pontko_jo' => $validated['pontko_jo'] ?? 0,
            'pontok_rossz' => $validated['pontok_rossz'] ?? 0,
            'pontok_ures' => $validated['pontok_ures'] ?? 0,
        ]);

        return response()->json(['success' => 'Verseny hozzáadva!']);
    } catch (QueryException $e) {
        return response()->json(['error' => 'Hiba történt a verseny hozzáadása közben: ' . $e->getMessage()], 500);
    }
}

}
