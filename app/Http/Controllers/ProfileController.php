<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\User;
use App\Models\StudyProfile;
use App\Models\Subject;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function editStudyProfile(Request $request) : View 
    {
        $user = $request->user();
        $studyProfile = $user->studyprofile()->firstOrCreate(['user_id' => $user->id], []);

        $allSubjects = Subject::orderBy('name')->get();
        $userSubjectIds = $studyProfile->subjects()->pluck('subjects.id')->toArray();


        return view('profile.study-edit', ['studyProfile' => $studyProfile, 'allSubjects' => $allSubjects, 'userSubjectIds' => $userSubjectIds]);
        
    }

    public function updateStudyProfile(Request $request) : RedirectResponse 
    {
        $user = $request->user();
        $studyProfile = $user->studyprofile()->firstOrCreate(['user_id' => $user->id], []);

        $validatedData = $request->validate([
            'bio' => 'nullable|string|max:1000',
            'city' => 'nullable|string|max:255',
            'major' => 'nullable|string|max:255',
            'subjects' => 'nullable|array',
            'subjects.*' => 'exists:subjects,id',
        ]);

        $studyProfile->update($request->except('subjects'));
        $studyProfile->subjects()->sync($request->input('subjects', []));

        return Redirect::route('profile.study.edit')->with('status', 'study-profile-updated');
    }

    public function destroyStudyProfile(Request $request): RedirectResponse
    {
        $user = $request->user();
        $studyProfile = optional($user->studyprofile);

        if ($studyProfile) {
            $studyProfile->delete();
        }
        return Redirect::route('profile.edit')->with('status', 'study-profile-deleted');
    }
}
