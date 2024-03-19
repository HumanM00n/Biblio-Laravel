<?php

// CE FICHIER PERMET DE DEFINIR TOUTES LES ACTIONS QUE PEUT EFFECTUER L'UTILISATEUR

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use App\Notifications\ActivateEmailLink;
use ReflectionFunctionAbstract;

class UserController extends Controller
{
    //Fonction qui retourne le formulaire d'inscription
    public function index() {
        return view('inscription');
    }

    // Fonction qui va sauvegarder les informations de l'utilisateur dans la base de données 
    public function store(Request $request) {
        // Validation des données
        $validateData = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string:min=8',
        ]);

        // Initiale qui correspond aux initiales des utilisateurs en majuscule
        $initial = strtoupper($request->input('nom')[0] . $request->input('prenom')[0]);

        $nombre = []; 
        // Tant que le tableau ($nombre) ne contient pas 5 éléments
        while(count($nombre) < 5) {
            $rand = rand(0 , 9); // Genère un nombre aléatoire entre 0 et 9
            $nombre[] = $rand; // Je mets le nombre aléatoire dans le tableau 
        }

        // Converti le tableau en chaine de caractère 
        $str = implode('', $nombre);
        // Le numéro adhérent est la concaténation entre $initial et $str
        $numeroAdherent = $initial . $str;

        // Enregistrer l'utilisateur 
        $user = User::create([
            'nom' => $validateData['nom'],
            'prenom' => $validateData['prenom'],
            'email' => $validateData['email'],
            'type' => 'adhérent',
            'password' => Hash::make($validateData['password']),
            'num_adherent' => $numeroAdherent
        ]);

        // Notification de mail pour valider 
        // event(new Registered($user));
        $user->notify(new ActivateEmailLink);
    }



    public function verification($id, $hash) {
        $user = User::findOrFail($id);
        $user->markEmailAsVerified();
        return view('emailverify');
    }

    # Méthode pour envoyer un nouveau lien de vérification
    public function sendNewLink(Request $request) { 
        $user = User::where('email', $request->input('email'))->first();
        $user->notify(new ActivateEmailLink);
    }

    # Méthode pour connecter l'utilisateur
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/'); #intended = S'il trouve que cette route, il y va SINON tu restes sur la route où l'on était juste avant   
        }
        return back();
    }

    public function connexion () {
        return view('connexion');
    }

    # Méthode pour déconnecter l'utilisateur
    public function logout (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->invalidate();
        return redirect('/');
    }
}
