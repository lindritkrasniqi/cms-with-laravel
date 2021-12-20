<?php

namespace App\Http\Controllers\Auth;

use App\Facades\Repositories\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LockAccountController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return Users::lockAccount($request);
    }
}
