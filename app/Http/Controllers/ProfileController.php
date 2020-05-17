<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
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
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $user = DB::connection('snet_slave')->selectOne("SELECT * FROM users WHERE id = ?", [$id]);

        if (!$user) {
            return redirect()->route('main', ['msg' => 'No such profile']);
        }

        return view('profile', [
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
