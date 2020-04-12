<?php


namespace App\Http\Controllers;


use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;
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
        $users = DB::connection('snet')->select("
            SELECT
                u.id, u.name, u.surname, IF(r.status IS NULL, -1, r.status) as status
            FROM users u LEFT JOIN friend_requests r ON (r.receiver_id = u.id AND r.requester_id = ?) OR (r.requester_id = u.id AND r.receiver_id = ?)
            WHERE
                u.id != ?", [Auth::id(), Auth::id(), Auth::id()]);

        return view('profiles_list', [
            'profiles'      => $users,
        ]);
    }
}
