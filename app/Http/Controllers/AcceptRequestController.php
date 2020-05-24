<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AcceptRequestController extends Controller
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

    public function acceptRequest(Request $request)
    {
        $cur_user_id = Auth::id();
        $req_id = $request->input('requester_id');
        DB::connection('snet')->insert('INSERT INTO friend_list(user_id_1, user_id_2) VALUE(?, ?)', [$req_id, $cur_user_id]);
        DB::connection('snet')->insert('INSERT INTO friend_list(user_id_1, user_id_2) VALUE(?, ?)', [$cur_user_id, $req_id]);
        DB::connection('snet')->update('UPDATE friend_requests SET status = 1 WHERE requester_id = ? AND receiver_id = ?', [$req_id, $cur_user_id]);
        return ['success' => true];
    }
}
