<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

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
     * Update profile of authenticated user
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'exists:users,email']
        ]);

        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return back()->with(['message' => 'You have updated your profile data successfully!']);
    }

    public function lock()
    {
        return back()->with(['message' => 'Your account has been lock from now!']);
    }
}
