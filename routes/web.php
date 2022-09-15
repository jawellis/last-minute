<?php

use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// All notices
Route::get('/', function () {
    return view('noticeBoard', [
        'heading' => 'Latest notices',
        'notices' => Notice::all()
    ]);
});

//Single notice
Route::get('/notices/{id}', function($id){
    return view('notice', [
        'notice' => Notice::find($id)
    ]);
});



/* Examples

Route::get('/hello', function () {
    Return 'Welcome!';
});

Route::get('/posts/{id}', function($id) {
    return response('Post '. $id);
})->where('id', '[0-9]+');

Route::get('/search', function(Request $request) {
   return $request->name . ' ' . $request->city;
});
*/


