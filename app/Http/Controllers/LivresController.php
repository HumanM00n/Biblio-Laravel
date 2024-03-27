<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livres;
use App\Models\Auteur;
use Illuminate\Support\Facades\Auth;

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

        // Enregistrer le livre
        $livre = Livres::create([
            'titre' =>$request->input('titre'),
            'isbn' => $isbn,
            'auteur_id' =>$request->input('auteur'),
            'annee_de_sortie' =>$request->input('date'),
            'image' => $imgName
        ]);

        return back()->with('error', 'Livre Ajouté...');
    }

    // Méthode qui retourne les informations d'un livre
    public function detailsLivre($id) {
        $livre = Livres::where('id', $id);

        return view('details', ['livre' => $livre]);
    }
}
