<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livres;

class LivresController extends Controller
{
    public function tousLesLivres() {
        $Livres = Livres::all();

        return view('home' , compact('Livres'));
    }
}
