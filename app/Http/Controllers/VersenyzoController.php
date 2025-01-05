<?php

namespace App\Http\Controllers;

use App\Models\Felhasznalo;
use App\Models\Fordulo;
use App\Models\Versenyzo;
use Illuminate\Http\Request;

class VersenyzoController extends Controller
{
    public function index()
{
    $felhasznalok = Felhasznalo::all();
    $fordulok = Fordulo::all();

    if ($felhasznalok->isEmpty()) {
        dd('Nincs adat a felhasznalok táblában');
    }

    if ($fordulok->isEmpty()) {
        dd('Nincs adat a fordulok táblában');
    }

    return view('versenyzo', compact('felhasznalok', 'fordulok'));
}

public function store(Request $request)
{
    $request->validate([
        'felhasznalo_id' => 'required|email|exists:felhasznalok,email',
        'fordulo_id' => 'required|exists:fordulok,id',
    ]);

    $existingPair = Versenyzo::where('felhasznalo_id', $request->felhasznalo_id)
                              ->where('fordulo_id', $request->fordulo_id)
                              ->first();

    if ($existingPair) {
        return response()->json(['success' => false, 'message' => 'Ez a párosítás már létezik.'], 400);
    }

    Versenyzo::create([
        'felhasznalo_id' => $request->felhasznalo_id,
        'fordulo_id' => $request->fordulo_id,
    ]);

    return response()->json(['success' => true, 'message' => 'Párosítás sikeres!']);
}
public function delete(Request $request)
{
    $request->validate([
        'felhasznalo_id' => 'required|email',
        'fordulo_id' => 'required|integer',
    ]);

    $versenyzo = Versenyzo::where('felhasznalo_id', $request->input('felhasznalo_id'))
                          ->where('fordulo_id', $request->input('fordulo_id'))
                          ->first();
    if ($versenyzo) {
        $versenyzo->delete();

        return response()->json([
            'success' => true,
            'message' => 'A párosítás sikeresen törölve lett.',
        ]);
    }

    return response()->json([
        'success' => false,
        'message' => 'Nincs ilyen párosítás.',
    ]);
}
}
