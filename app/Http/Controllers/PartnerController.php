<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\StudyProfile;

class PartnerController extends Controller
{
    public function index(): View
    {
        $partners = StudyProfile::with('user')->orderBy('created_at', 'desc')->paginate(10);

        return view('partners.index', ['partners' => $partners]);
    }

    public function show(StudyProfile $studyProfile): View
    {
        $studyProfile->load(['user', 'subjects']);
        $currentUser = Auth::user(); 

        return view('partners.show', [
            'partner' => $studyProfile, 'isConnected' => $currentUser ? $currentUser->connections()->where('connected_user_id', $studyProfile->user->id)->exists() : false
        ]);
    }
}

