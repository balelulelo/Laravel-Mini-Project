<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
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
        $studyProfile->load('user'); 

        return view('partners.show', [
            'partner' => $studyProfile
        ]);
    }
}

