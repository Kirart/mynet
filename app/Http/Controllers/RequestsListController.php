<?php

namespace App\Http\Controllers;

use App\Events\NewFriend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RequestsListController extends Controller
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
        $requesters = DB::connection('snet')->select("
            SELECT
                u.id, u.name, u.surname FROM friend_relations f JOIN users u ON u.id = f.requester_id
            WHERE
                receiver_id = ?
                AND status = 0", [Auth::id()]);


        return view('requests_list', [
            'profiles' => $requesters,
        ]);
    }

    public function newFriend(Request $request)
    {
        DB::connection('snet')->insert('insert into friend_relations (requester_id, receiver_id, status) values (?, ?, 0)', [
            Auth::id(),
            $request->input('receiver_id'),
        ]);
        return response()->json('success');
    }
}
