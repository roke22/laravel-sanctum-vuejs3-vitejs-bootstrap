<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Handle logout
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request): \Illuminate\Http\Response
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response([], 200);
    }
}
