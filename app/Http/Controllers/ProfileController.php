<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.blade.php');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('personalProfile')->with('notices', $user->notices);
    }

    public function updateUserPlus(Request $request)
    {
        $user_id = Auth::id();
        User::where('id', $user_id)->update(['user_plus' => !User::where('id', $user_id)->first()->user_plus]);
        return redirect()->back();
    }


}
