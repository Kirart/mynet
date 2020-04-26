<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(Request $request) {
//        $names = [];
//        $surnames = [];
//
//        if (($handle = fopen('/var/www/otus/laravel_test/auth_test/names.txt', "r"))) {
//            while (($data = fgetcsv($handle, 1000, " ")) !== false) {
////                $name = $data[0];
////                $surname = $data[1];
//                $names[] = $data[0];
//                $surnames[] = $data[1];
//            }
//            fclose($handle);
//        }
//
//        for ($i = 0; $i < 1000000; $i++) {
//            $k = array_rand($names);
//            $n = array_rand($surnames);
//
//            $name = $names[$k];
//            $surname = $surnames[$n];
//            $age = rand(18, 80);
//            $gender = rand(0, 1);
//            $password = $this->randomString();
//            $email = $this->randomString() . '@mail.ru';
//            $city = 'Moscow';
//            $interests = 'different';
//
//            DB::connection('snet')->insert('insert into users (name, surname, age, email, male, city, password, interests) values (?, ?, ?, ?, ?, ?, ?, ?)', [
//                $name,
//                $surname,
//                $age,
//                $email,
//                $gender,
//                $city,
//                $password,
//                $interests
//            ]);
//
//        }

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
