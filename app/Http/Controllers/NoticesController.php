<?php

namespace App\Http\Controllers;

//use App\Models\Notice;
use App\Models\Notice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Mockery\Matcher\Not;

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

            'notices' => Notice::All()
//                ->paginate(3)
        ]);
    }

        public function noticeStatusUpdate(Request $request)
    {
        $notice = Notice::find($request->notice_id);
        $notice->status = $request->status;
        $notice->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
//


        //search

    public function search() {
        $search = $_GET['query'];
        $notices = Notice::where('name', 'LIKE', "%{$search}%")
            ->orWhere('location', 'LIKE', "%{$search}%")
            ->orWhere('day_part_tags', 'LIKE', "%{$search}%")
            ->get();
        return view('pages.search', compact('notices'));
    }

    //Filter function
    public function filter()
    {
        return view('pages.noticeBoard',[
            'notices' => Notice::all()->filter()->where('status', '1')



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
            'day_part_tags' => 'required',
             'user_id' => 'required'
        ]);
        Notice::create($formFields);

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
            'notice' => Notice::find($id),
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        return view('pages.editNotice', [
            'notice'=> $notice
        ]);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Notice $notice)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'from_time' => 'required',
            'until_time' => 'required',
            'location' => 'required',
            'day_part_tags' => 'required',
            'user_id' => 'required'
        ]);
        $notice->create($formFields);
        return redirect('personalProfile');

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
