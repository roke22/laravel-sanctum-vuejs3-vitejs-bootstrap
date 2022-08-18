<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    /**
     * Check email, create token and send email for forgot password
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function forgotPassword(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate(['email' => 'required|email']);
        $user = User::where('email', $request->input('email'))->count();

        if ($user == 0) {
            return response()->json(['status' => '¡El email no esta registrado!'], 404);
        }

        $token = Str::uuid();
        $urlToken = config('app.url') . '/reset-password\/' . $token;

        PasswordReset::updateOrCreate(
            ['email' => $request->input('email')],
            ['token' => $token]
        );

        Mail::to($request->input('email'))->send(new ResetPassword($urlToken));
        return response()->json(['status' => '¡Email enviado!'], 200);
    }

    /**
     * Check token is valid, if is invalid throw 404 response with firstOrFail
     *
     * @param  string $token
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkToken(string $token): \Illuminate\Http\JsonResponse
    {
        $resetData = PasswordReset::where('token', $token)->firstOrFail();

        return response()->json(['email' => $resetData->email], 200);
    }

    /**
     * Check email and token are correct then change password and invalidate all sessions
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetPassword(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make(
            [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'token' => $request->input('token')
        ],
            [
                'email' => ['required', 'email'],
                'password' => ['required', 'string', 'min:8'],
                'token' => ['required', 'string']
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'data' => [],
                'errors' => $validator->errors()->all()
            ]);
        }

        $tokenData = PasswordReset::where([
            ['email', $request->input('email')],
            ['token', $request->input('token')]
        ])->firstOrFail();

        $tokenData->delete();

        $user = User::where('email', $request->input('email'))->first();

        /** @phpstan-ignore-next-line */
        $user->forceFill([
            /** @phpstan-ignore-next-line */
            'password' => Hash::make($request->input('password'))
        ])->setRememberToken(Str::random(60));

        /** @phpstan-ignore-next-line */
        $user->save();

        return response()->json([], 200);
    }
}
