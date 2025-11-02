<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objective;
use App\Models\Evaluation;

class EvaluationController extends Controller
{
    public function dashboardEvaluation()
    {
        $user = Auth::user();

        if ($user->role === 'agent') {
            // Agent : voir ses propres objectifs
            $objectives = Objective::where('user_id', $user->id)->get();
        } else {
            // Manager : voir les objectifs des agents qu’il supervise
            $objectives = Objective::whereHas('user', function ($query) use ($user) {
                $query->where('manager_id', $user->id);
            })->get();
        }

        return view('dashboard-self-evaluation', compact('objectives', 'user'));
    }

    public function show($id)
{
    // Étape 1 : On récupère l'objectif avec son évaluation s’il existe déjà
    $objective = Objective::with('evaluation')->findOrFail($id);

    // Étape 2 : On retourne la vue du formulaire d'évaluation avec les infos
    return view('evaluate-form', compact('objective'));
}

    public function storeEvaluation(Request $request, Objective $objective)
    {
         $validated = $request->validate([
        'objective_id' => 'required|exists:objectives,id',
        'score' => 'required|numeric|min:0|max:100',
        'comments' => 'required|string|max:255',
    ]);

    // Création ou mise à jour d'une évaluation
    $evaluation = Evaluation::updateOrCreate(
        ['objective_id' => $validated['objective_id']],
        [
            'score' => $validated['score'],
            'comments' => $validated['comments'],
            'evaluator_id' => auth()->id() // facultatif selon ta table
        ]
    );

    return redirect()->back()->with('success', 'Évaluation enregistrée avec succès.');
}

}
