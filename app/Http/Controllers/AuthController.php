<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\PasswordCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Affiche le formulaire pour saisir l'email
    public function showForgotForm()
    {
        return view('forgot-password');
    }

    // Traite la saisie de l'email, génère le code et envoie l'email
    public function sendCode(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Aucun utilisateur trouvé avec cet email']);
        }

        // Générer un code à 6 chiffres aléatoire
        $code = rand(100000, 999999);

        // Enregistrer ou mettre à jour le code dans la table password_codes
        PasswordCode::updateOrCreate(
            ['email' => $user->email],
            [
                'code' => $code,
                'expires_at' => Carbon::now()->addMinutes(5),
            ]
        );

        // Envoyer l'email avec le code
        Mail::raw("Votre code de réinitialisation est : $code. Il expire dans 5 minutes.", function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Code de réinitialisation de mot de passe');
        });

        // Stocker l'email en session pour la prochaine étape
        return redirect()->route('password.verify.code')->with('email', $user->email)
            ->with('status', 'Code envoyé par email ! Vérifiez votre boîte de réception.');
    }

    // Affiche le formulaire pour saisir le code reçu
    public function showVerifyForm()
    {
        return view('verify-code');
    }

    // Vérifie le code entré par l'utilisateur
    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:6',
        ]);

        if (!$record) {
            return back()->withErrors(['code' => 'Aucun code trouvé pour cet email']);
        }

        if ($record->code !== $request->code) {
            return back()->withErrors(['code' => 'Code invalide']);
        }

        if (Carbon::now()->greaterThan($record->expires_at)) {
            return back()->withErrors(['code' => 'Le code a expiré']);
        }

        // Code valide : on stocke l'email en session pour la prochaine étape
        return redirect()->route('password.reset.form')->with('email', $request->email);
    }

    // Affiche le formulaire de réinitialisation du mot de passe
    public function showResetForm()
    {
        return view('password-finally');
    }

    // Traite la réinitialisation du mot de passe
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Utilisateur non trouvé']);
        }

        // Mettre à jour le mot de passe
        $user->password = Hash::make($request->password);
        $user->save();

        // Supprimer le code pour éviter réutilisation
        PasswordCode::where('email', $request->email)->delete();

        return redirect()->route('login')->with('status', 'Mot de passe réinitialisé avec succès. Connectez-vous !');
    }
}
