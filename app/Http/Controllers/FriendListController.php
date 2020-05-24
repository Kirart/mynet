<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FriendListController extends Controller
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
        $friends = DB::connection('snet')->select("
            SELECT
                u.id, u.name, u.surname
            FROM friend_list f JOIN users u ON u.id = f.user_id_2
            WHERE
                user_id_1 = ?", [Auth::id()]);

        return view('friends_list', [
            'profiles' => $friends,
        ]);
    }
}
