<?php

namespace App\Http\Controllers;

use App\Events\NewFriend;
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
        DB::connection('snet')->update('UPDATE friend_relations SET status = 1 WHERE receiver_id = ? AND requester_id = ?', [
            Auth::id(),
            $request->input('requester_id'),
        ]);
        return response()->json('success');
    }
}
