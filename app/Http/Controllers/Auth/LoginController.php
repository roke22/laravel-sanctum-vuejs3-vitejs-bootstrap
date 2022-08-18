<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make(
            [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'remember' => $request->input('remember', false)
        ],
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
                'remember' => ['boolean']
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'data' => [],
                'errors' => $validator->errors()->all()
            ]);
        }

        if (Auth::attempt($request->only(['email', 'password'], $request->input('remember', true)))) {
            $user = User::find(Auth::id());
            $request->session()->regenerate();

            return response()->json([
                'data' => [
                    'user' => $user,
                ]
            ], 200);
        }

        return response()->json([
            'errors' => ['El email o password no son correctos.'],
        ], 401);
    }
}
