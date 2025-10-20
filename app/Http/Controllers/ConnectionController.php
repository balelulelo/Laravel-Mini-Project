<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class ConnectionController extends Controller
{
    public function store(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'connected_user_id' => 'required|exists:users,id|different:user_id',
        ]);

        $currentUser = Auth::user();

        if ($currentUser->connections()->where('connected_user_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'Connection already exists.');
        }

        if ($currentUser->id === $user->id) {
            return redirect()->back()->with('error', 'You cannot connect to yourself.');
        }

        $currentUser->connections()->attach($user->id);

        return redirect()->back()->with('success', 'Successfully connected to the user.');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        $currentUser = Auth::user();

        if (!$currentUser->connections()->where('connected_user_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'Connection does not exist.');
        }

        $currentUser->connections()->detach($user->id);

        return redirect()->back()->with('success', 'Successfully removed user from connections.');
    }
}
