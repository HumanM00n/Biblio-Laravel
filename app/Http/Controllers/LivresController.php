<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livres;
use App\Models\Auteur;

class LivresController extends Controller
{
    public function tousLesLivres() {
        $Livres = Livres::all();

        return view('home' , compact('Livres'));
    }

    public function index() {
        $auteurs = Auteur::all();
        return view('ajoutlivre', ['auteurs' => $auteurs]);
    }

    public function store(Request $request) {
        // Generer l'isbn 
        $isbn = date('YmdHis');

        // Sauvegarder l'image dans le dossier uploads de public 
        $image = $request->file('photo');
        $imgName = time(). '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imgName);


    }
}
