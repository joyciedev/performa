<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objective;
use App\Models\Evaluation;

class ObjectiveController extends Controller
{
    // afficher tous les objectifs
    public function create() {

        if (auth()->user()->roles !== 'agent') {
        abort(403, 'Accès réservé aux agents.');
    }

        return view ('user-create-objective');
    }

    //enregistrer chzque objectifs dans la table
    public function store(Request $request) {

        if (auth()->user()->roles !== 'agent') {
        abort(403, 'Seuls les agents peuvent créer des objectifs.');
    }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'weight' => 'required|integer',
            'value' => 'required|integer',
            'metric' => 'required|string',
        ]);

    Objective::create($validated);

    return redirect()->route('dashboard')->with('success', 'Objectif créé avec succès');
    }

    public function dashboard() {
    $objectives = Objective::latest()->get();
    return view('dashboard', compact('objectives'));
    }

    public function edit($id)
{
    $objective = Objective::findOrFail($id);
    return view('edit', compact('objective'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'date_debut' => 'required|date',
        'date_fin' => 'required|date',
        'weight' => 'required|integer',
        'value' => 'required|string',
        'metric' => 'required|string',
    ]);

    $objective = Objective::findOrFail($id);
    $objective->update($validated);

    return redirect()->route('dashboard');
}

    public function destroy($id)
{
    $objective = Objective::find($id);

    if (!$objective) {
        return response()->json(['success' => false, 'message' => 'Objectif introuvable.'], 404);
    }

    $objective->delete();

    return response()->json(['success' => true]);
}

public function collaboratorObjectives()
{
    // Récupérer tous les objectifs (ou filtrer selon le collaborateur)
    $objectives = Objective::all();

    // Envoyer les données à la vue
    return view('collaborator-objective', compact('objectives'));
}

public function collaborateEvaluation()
{
    // Récupérer tous les objectifs (ou filtrer selon le collaborateur)
    $evaluations = Objective::all();

    // Envoyer les données à la vue
    return view('collaborator-evaluation', compact('evaluations'));
}


}


