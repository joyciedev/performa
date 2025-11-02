<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
//     public function index()
// {
//     $user = Auth::user();

//     // Si c'est un agent
//     if ($user->role === 'agent') {
//         $objectives = $user->objectives()->with('evaluation')->get();

//         return view('dashboard.shared', [
//             'objectives' => $objectives,
//             'isManager' => false,
//         ]);
//     }

//     // Si c'est un manager
//     if ($user->role === 'manager') {
//         // Tous les agents sous sa responsabilité
//         $agents = $user->agents()->with(['objectives.evaluation'])->get();

//         return view('dashboard.shared', [
//             'agents' => $agents,
//             'isManager' => true,
//         ]);
//     }
// }
}
