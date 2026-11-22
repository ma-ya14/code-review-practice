<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user->password === $request->password) {
            Auth::login($user);
            return redirect('/dashboard');
        }

        return back()->withErrors(['email' => 'ログインに失敗しました']);
    }
}
