<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollaborateController extends Controller
{
    public function create() {
        return view('user-create-self-evaluation');
    }

    public function store(Request $request) {
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

        return redirect()->route('collaborator-objective');
}

        public function collaborate() {
            $objectives::all();
            return view('collaborator-objective', compact('objectives'));
        }

        public function collaborateEvaluation() {
            $evaluations::all();
            return view('collaborator-evaluation', compact('evaluations'));
        }
}
