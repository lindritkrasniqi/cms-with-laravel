<?php

namespace App\Http\Controllers;

use App\Facades\Services\Avatar;
use App\Http\Requests\AvatarRequest;

class AvatarController extends Controller
{
    public function store(AvatarRequest $request)
    {
        Avatar::store($request->file('avatar'));

        return back()->with(['message' => __('user.avatar.stored')]);
    }

    public function update(AvatarRequest $request)
    {
        Avatar::update($request->file('avatar'));

        return back()->with(['message' => __('user.avatar.updated')]);
    }

    public function destroy()
    {
        Avatar::destroy();

        return back()->with(['message' => __('user.avatar.destroyed')]);
    }
}
