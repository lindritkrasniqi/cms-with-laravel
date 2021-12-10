<?php

namespace App\Http\Controllers;

use App\Facades\Repositories\UsersRepository;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);

        $users = UsersRepository::all();

        return view('menage.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);

        return view('menage.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $this->authorize('create', User::class);

        $user = User::create(array_merge($request->validated(), ['password' => bcrypt($request->validated()['password'])]));

        return back()->with(['message' => __('user.stored', ['name' => $user->name])]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);

        if ($user->id === auth()->id()) {
            return redirect()->route('profile');
        }

        return view('menage.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        if ($user->id === auth()->id()) {
            return redirect()->route('profile');
        }

        return view('menage.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        if ($user->id === auth()->id()) {
            return redirect()->route('profile');
        }

        $user->update($request->validated());

        return back()->with(['message' => __('user.updated', ['name' => $user->name])]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        if ($user->id === auth()->id()) {
            return redirect()->route('profile');
        }

        $user->delete();

        return redirect()->route('menage.users')->with(['message' => __('user.destroyed', ['name' => $user->name])]);
    }

    public function changePassword(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $request->validate([
            'password' => ['required', 'string', 'confirmed', 'min:8']
        ]);

        $user->update(['password' => bcrypt($request->password)]);

        return redirect()->route('menage.users')->with(['message' => __('user.password', ['name' => $user->name])]);
    }

    public function trashed()
    {
        $this->authorize('viewTrashed', User::class);

        $users = UsersRepository::trashed();

        return view('trashed.users', compact('users'));
    }

    public function restore(User $user)
    {
        $this->authorize('restore', $user);

        $user->restore();

        return redirect()->route('menage.users.trashed')->with(['message' => __('user.restored', ['name' => $user->name])]);
    }

    public function delete(User $user)
    {
        $this->authorize('forceDelete', $user);

        $user->forceDelete();

        return redirect()->route('menage.users.trashed')->with(['message' => __('user.deleted', ['name' => $user->name])]);
    }
}
