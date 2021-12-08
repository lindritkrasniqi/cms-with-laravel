<?php

namespace App\Http\Controllers\Auth;

use App\Facades\Repositories\UsersRepository;
use App\Http\Controllers\Controller;

class LockAccountController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        UsersRepository::lockAccount();

        return back();
    }
}
