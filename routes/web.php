
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObjectiveController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function() {
    return view('dashboard');
})->name("dashboard");

Route::get('/sidebar', function() {
    return view('partials.sidebar');
})->name("sidebar");

Route::get('/user-create-objective', function() {
    return view('user-create-objective');
})->name('user-create-objective');

// Route::get('/dashboard-self-evaluation', function() {
//     return view('dashboard-self-evaluation');
// })->name('dashboard-self-evaluation');

Route::get('/user-create-self-evaluation', function() {
    return view('user-create-self-evaluation');
})->name('user-create-self-evaluation');

Route::get('/collaborator-evaluation', function() {
    return view('collaborator-evaluation');
})->name('collaborator-evaluation');

Route::get('/collaborator-objective', function() {
    return view('collaborator-objective');
})->name('collaborator-objective');

Route::get('/evaluation-history', function() {
    return view('evaluation-history');
})->name('evaluation-history');

Route::get('/verify-code', function() {
    return view('verify-code');
})->name('verify-code');

// Route::get('/forgot-password', function() {
//     return view('forgot-password');
// })->name('forgot-password');

Route::get('/password-finally', function() {
    return view('password-finally');
})->name('password-finally');


Route::post('/objectif', [ObjectiveController::class, 'store'])->name('objectives.store');

Route::get('/objectif/create', [ObjectiveController::class, 'create'])->name('user-create-objective');

Route::get('/dashboard', [ObjectiveController::class, 'dashboard'])->name('dashboard');

// Route::get('/dashboard-self-evaluation', [ObjectiveController::class, 'dashboardSelfEvaluation'])->name('dashboard-self-evaluation');

Route::delete('/objectifs/{id}', [ObjectiveController::class, 'destroy'])->name('objectives.destroy');

// Route::get('/objectif/store', [ObjectiveController::class, 'store'])->name('objectives.store');

// Pour afficher le formulaire de modification
Route::get('/objectives/{id}/edit', [ObjectiveController::class, 'edit'])->name('edit');

// Pour soumettre la modification
Route::put('/objectives/{id}', [ObjectiveController::class, 'update'])->name('objectives.update');

Route::get('/dashboard-auth', [UserAuthController::class, 'dashboard'])->name('dashboard-auth');


Route::get('/', [UserAuthController::class, 'index'])->name('login_view');


Route::post('user_login',[UserAuthController::class, 'user_login'])->name('login-fn');


Route::post('/signout', [UserAuthController::class, 'signout'])->name('signout');

Route::prefix('evaluation')->middleware(['auth'])->group(function () {
    // Route POST pour enregistrer l'évaluation par le manager
    Route::post('/evaluate-form', [EvaluationController::class, 'storeEvaluation'])->name('evaluate-form.store');
    Route::get('/evaluate/{objective}', [EvaluationController::class, 'show'])->name('evaluate-form.show');
});

// Route GET pour afficher le tableau de bord (celui qui affiche les évaluations)
Route::middleware(['auth'])->get('/dashboard-self-evaluation', [EvaluationController::class, 'dashboardEvaluation'])->name('dashboard-self-evaluation');






// Affiche le formulaire où l'utilisateur entre son email pour recevoir le code
Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('forgot-password');

// Traite la soumission du formulaire d'email, vérifie l'email et envoie le code par email
Route::post('/forgot-password', [AuthController::class, 'sendCode'])->name('password.send.code');

// Affiche le formulaire où l'utilisateur saisit le code reçu par email
Route::get('/verify-code', [AuthController::class, 'showVerifyForm'])->name('password.verify.code.form');

// Traite la vérification du code saisi par l'utilisateur
Route::post('/verify-code', [AuthController::class, 'verifyCode'])->name('password.verify.code');

// Affiche le formulaire final de réinitialisation du mot de passe (nouveau mot de passe + confirmation)
Route::get('/reset-password', [AuthController::class, 'showResetForm'])->name('password.reset.form');

// Traite la soumission du nouveau mot de passe, le valide et met à jour la base de données
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.reset.final');


// Route::get('/test-mail', function () {
//     Mail::raw('Ceci est un test !', function ($message) {
//         $message->to('joyciekamgo64@gmail.com')
//                 ->subject('Mon premier test');
//     });

//     return "Bien reçu";
// });

Route::get('/collaborator/objectives', [ObjectiveController::class, 'collaboratorObjectives'])->name('collaborator-objective');


Route::get('/collaborator/evaluate', [ObjectiveController::class, 'collaborateEvaluation'])->name('evaluate-form');



Route::middleware(['auth'])->group(function () {
    Route::get('/assign-manager', [UserController::class, 'showAssignManagerForm'])->name('assign.manager.form');
    Route::post('/assign-manager', [UserController::class, 'assignManager'])->name('assign.manager');
});


// Route::get('/dashboard/evaluate', [DashboardController::class, 'index'])->name('dashboard');
