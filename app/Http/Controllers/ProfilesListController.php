<?php


namespace App\Http\Controllers;


use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\DB;

class ProfilesListController extends Controller
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
     * @return Renderable
     */
    public function index()
    {
        $users = DB::connection('snet')->select("SELECT id, name, surname FROM users");

        return view('profiles_list', [
            'profiles'      => $users,
        ]);
    }
}
