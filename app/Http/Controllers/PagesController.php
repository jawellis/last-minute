<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    // index page
    public function index() {
        return view('pages.index');
    }

    public function show() {
        return view('pages.authUserProfile');
    }











//    public function noticeBoard() {
//        return view('pages.noticeBoard', [
//        'notices' => Notice::all()
//    ]);
//    }

//    public function profile($id) {
//        return view('pages.profile', [
//        'notice' => Notice::find($id)
//    ]);
//    }

}
