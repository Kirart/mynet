<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function register(Request $request) {
        if ($request->method() == 'GET') {
            return view('auth.register');
        } else {
            DB::connection('snet')->insert('insert into users (name, surname, email, male, city, password, interests) values (?, ?, ?, ?, ?, ?, ?)', [
                $request->input('name'),
                $request->input('surname'),
                $request->input('email'),
                $request->input('gender') == 'male',
                $request->input('city'),
                password_hash($request->input('password'), PASSWORD_BCRYPT),
                $request->input('interests') ?: ''
            ]);

            return view('auth.login')->with('success', 'Account created');
        }
    }
}
