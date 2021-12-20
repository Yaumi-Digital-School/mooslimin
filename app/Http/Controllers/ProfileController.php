<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\KomentarForum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = KomentarForum::count();
        // dd($downvote);
        // dd($count->count());
        $forums = Forum::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        return view('pages.profile.index',compact('forums','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p = User::find(Auth::user()->id);
        $p->name = $request->name;

        if($request->hasFile('upload')){
            $request->file('upload')->move('img/avatar/', $request->file('upload')->getClientOriginalName());
            $p->avatar = $request->file('upload')->getClientOriginalName();
            if($request->oldimg != 'default.png'){
                File::delete('img/avatar/'.$request->oldimg);
            }
        }
        $p->save();
        return redirect()->route('profile.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
