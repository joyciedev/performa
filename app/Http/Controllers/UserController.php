<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showAssignManagerForm()
{
    $agents = User::where('roles', 'agent')->get();
    $managers = User::where('roles', 'manager')->get();

    return view('assign-manager', compact('agents', 'managers'));
}

public function assignManager(Request $request)
{
    $request->validate([
        'agent_id' => 'required|exists:users,id',
        'manager_id' => 'required|exists:users,id',
    ]);

    $agent = User::find($request->agent_id);
    $agent->manager_id = $request->manager_id;
    $agent->save();

    return back()->with('success', 'Manager attribué avec succès à l’agent.');
}

}
