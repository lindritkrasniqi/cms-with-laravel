<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{

    /**
     * Show the profile of authenticated user
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        return view('auth.profile');
    }

    /**
     * Update profile method
     *
     * @param  Request $request
     * @return void
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', Rule::unique('users')->ignore($request->user()->id)]
        ]);

        $request->user()->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return back()->with(['message' => 'You have updated your profile data successfully!']);
    }
}
