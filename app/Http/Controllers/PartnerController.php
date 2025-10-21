<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\StudyProfile;
use App\Models\Subject;

class PartnerController extends Controller
{
    public function index(Request $request): View
    {

        $currentUser = Auth::user();
        $currentUserSubjectIds = $currentUser->studyprofile?->subjects()->pluck('id')->toArray() ?? [];

        $query = StudyProfile::with(['user', 'subjects']);

        // filter - name
        if ($request->filled('name')) {
            $searchTerm = '%' . $request->input('name') . '%';
            $query->whereHas('user', function ($q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm);
            });
        }
        // filter - makor
        if ($request->filled('major')) {
            $query->where('major', 'like', '%' . $request->input('major') . '%');
        }
        // filter - subject
        if ($request->filled('subject')) {
            $subjectId = $request->input('subject');
            $query->whereHas('subjects', function ($q) use ($subjectId) {
                $q->where('subjects.id', $subjectId);
            });
        }

        if (!empty($currentUserSubjectIds)) {
            $query->select('study_profiles.*') 
                  ->selectSub(function ($subQuery) use ($currentUserSubjectIds) {
                      $subQuery->selectRaw('count(distinct subject_id)')
                               ->from('subject_study_profile')
                               ->whereColumn('subject_study_profile.study_profile_id', 'study_profiles.id')
                               ->whereIn('subject_study_profile.subject_id', $currentUserSubjectIds);
                  }, 'matching_subjects_count')
                  ->orderByDesc('matching_subjects_count')
                  ->orderByDesc('study_profiles.created_at');
        } else {
            $query->orderByDesc('created_at');
        }
        $partners = $query->paginate(10);

        $allSubjects = Subject::orderBy('name')->get();

        return view('partners.index', [
            'partners' => $partners,
            'allSubjects' => $allSubjects,
        ]);
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

