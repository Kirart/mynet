<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = DB::connection('snet_slave')->selectOne("SELECT * FROM users WHERE id = ?", [Auth::id()]);

        return view('home', [
            'name'      => $user->name,
            'surname'   => $user->surname,
            'email'     => $user->email,
            'gender'    => $user->male ? 'Male' : 'Female',
            'city'      => $user->city,
            'age'       => $user->age,
            'interests' => $user->interests
        ]);
    }
}
