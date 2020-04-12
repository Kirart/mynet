<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param null $message
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (Auth::id() && !$request->input('msg')) {
            return redirect()->route('profile', Auth::id());
        }
        return view('main', [
            'message' => $request->input('msg') ?? 'Login to view the content'
        ]);
    }
}
