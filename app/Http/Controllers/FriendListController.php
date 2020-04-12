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
        $friends_outcoming = DB::connection('snet')->select("
            SELECT
                u.id, u.name, u.surname FROM friend_relations f JOIN users u ON u.id = f.receiver_id
            WHERE
                requester_id = ?
                AND status = 1", [Auth::id()]);

        $friends_incoming = DB::connection('snet')->select("
            SELECT
                u.id, u.name, u.surname FROM friend_relations f JOIN users u ON u.id = f.receiver_id
            WHERE
                receiver_id = ?
                AND status = 1", [Auth::id()]);


        return view('friends_list', [
            'profiles' => array_merge($friends_outcoming, $friends_incoming),
        ]);
    }
}
