<?php

namespace App\Http\Controllers;

//use App\Models\Notice;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NoticesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.noticeBoard', [
            // show notice and order by time
            'notices' => Notice::all()
//                ->paginate(3)
        ]);
    }

    //Filter function
    public function filter()
    {
        return view('pages.noticeBoard', [
            // show notice and order by time
            'notices' => Notice::where('active', '0')->get()
            //orderBy('from_time', 'asc')->get()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.createNotice');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     * @throws ValidationException
     */
    public function store(Request $request): string
    {
        $formFields = $request->validate([
            'name' => 'required',
            'from_time' => 'required',
            'until_time' => 'required',
            'location' => 'required',
            'day_part_tags' => 'required'
        ]);
        Notice::create($formFields);
//
        return redirect('noticeBoard');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.profile', [
            'notice' => Notice::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
