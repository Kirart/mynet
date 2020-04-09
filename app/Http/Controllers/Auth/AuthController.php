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
                return redirect()->route('home');
            } else {
                redirect()->route('login')->with('failure', 'Incorrect password');
            }
        }
    }


    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('main');
    }
}
