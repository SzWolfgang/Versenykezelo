<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Felhasznalo;

class FelhasznaloController extends Controller
{
    public function index()
    {
        
        $felhasznalok = Felhasznalo::all();  

        return view('felhasznalok', compact('felhasznalok'));
    }
}
