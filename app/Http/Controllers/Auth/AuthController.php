<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(Request $request) {
        if ($request->method() == 'GET') {
            return view('auth.login');
        } else {
            $user = DB::connection('snet')->selectOne("SELECT * FROM users WHERE email = ?", [$request->input('email')]);

            if (password_verify($request->input('password'), $user->password)) {
                Auth::loginUsingId($user->id);
                return redirect()->route('profile', Auth::id());
            } else {
                redirect()->route('login');
            }
        }
        return view('auth.login')->withErrors(['Incorrect password']);
    }


    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('main');
    }

    public function randomString() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        $n = rand(10, 50);
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
}
