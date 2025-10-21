<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {

        /** @var \App\Models\User $user */
        
        $user = Auth::user();

        $user->load(['studyprofile.subjects', 'connections.studyprofile']);
        $connections = $user->connections;

        return view('dashboard', [
            'user' => $user, 
            'connections' => $connections, 
        ]);
    }
}