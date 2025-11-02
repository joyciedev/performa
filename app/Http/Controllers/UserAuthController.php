<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserAuthController extends Controller
{
    public function index(){   // lorsque l'utilisateur se dirige vers le login
        return view('login'); // public function index() sert principalement à afficher la liste des éléments d’une ressource (comme des objectifs, utilisateurs, produits, etc.).
    }

    public function user_login(Request $request) {  // $request contient toutes les données saisies et on appelle user_login lorsque l'utilisateur soumet le formulaire via POST
        $validated = $request->validate ([
            'email' => 'required',
            'password' => 'required',
        ]);

    $credentials = $request->only('email', 'password');  //récupère seulement les champs email et password du formulaire envoyé via $request, et elle les place dans un tableau
    if(Auth::attempt($credentials)) {   //essaie de connecter l’utilisateur en comparant l’email et le mot de passe hashé avec ceux de la base de données.
        return redirect()->intended('dashboard')->withsucces('Signed in'); // redirection automatique vers le dashboard après connexion

    }
    return redirect("/")->withErrors([
    'emailPassword' => 'Email address or password is incorrect.', // au cas où la connexion a échoué
    ]);
    }

    public function dashboard() {
    if(Auth::check()){
        return view('dashboard');
    }
    return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signout() {
        // Supprime toutes les données de session
    Session::flush();

    // Déconnecte l'utilisateur
    Auth::logout();

    // Redirige vers la page de login
    return redirect('/');
    }

}
