<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use function redirect;


class LoginController extends Controller
{
     /**
     * This action returns a remember token if the user successfully logged in.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials,true)) {
            $request->session()->regenerate();
            return response()->json([
                'login' => 'success',
                'token' => $request->session()->token(),
            ]);
        }
        return back()->withErrors([ /*todo return error */
            'error' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Session invalidated on logout.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json([
            'logout' => 'user successfully logged out',
        ]);
    }

    /**
     * Check if there is a logged in user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loggedIn(Request $request){
        $user = Auth::user();
        return response()->json([
            'logged in user' => $user,
        ]);
    }
}
