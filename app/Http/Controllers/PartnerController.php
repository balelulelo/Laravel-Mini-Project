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
        $partners = StudyProfile::with('user')->latest->paginate(10);

        return view('partners.index', ['partners' => $partners]);
    }

    public function show(int $id): View
    {
        $partner = StudyProfile::with('user')->findOrFail($id);

        return view('partners.show', ['partner' => $partner]);
    }
}
