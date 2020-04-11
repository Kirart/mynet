<?php


namespace App\Http\Controllers;


use App\Events\NewFriend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MakeFriendsController extends Controller
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
        event(new NewFriend());
        return view('profiles_list');
    }
}

