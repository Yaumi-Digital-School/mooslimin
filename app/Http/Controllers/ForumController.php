<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\ForumVote;
use App\Models\KomentarForum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = KomentarForum::count();
        $upvote = ForumVote::where('type','upvote')->sum('value');
        $downvote = ForumVote::where('type','downvote')->sum('value');
        // dd($downvote);
        // dd($count->count());
        $forums = Forum::orderBy('created_at','desc')->get();
        return view('pages.forum.index',compact('forums','count','upvote','downvote'));
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
        $forum = new Forum;
        // $forum->title = $request->title;
        // $forum->slug = Str::slug($request->title);
        $forum->user_id = Auth::user()->id;
        $forum->desc = $request->desc;

        if($request->hasFile('image')){
            $request->file('image')->move('img/forum/', $request->file('image')->getClientOriginalName());
            $forum->image = $request->file('image')->getClientOriginalName();
        }
        $forum->save();
        return redirect()->route('forum.index');
    }

    public function add_comment(Request $request){
        $request->request->add(['user_id' => auth()->user()->id]);
        KomentarForum::create($request->all());
        return redirect()->back();
    }
    
    public function forum_vote(Request $request){
        $request->request->add(['user_id' => auth()->user()->id]);
        // dd($request->type);
        $cek = ForumVote::where('user_id',auth()->user()->id)->first();
        if($cek == null){
            ForumVote::create($request->all());
            return redirect()->back(); 
        }else{
            // dd('ada isi');
            if($cek->type == $request->type){
                dd('udah vote');
            }else{
                // dd('ganti vote');
                ForumVote::where('user_id',auth()->user()->id)->update([
                    'type' => $request->type,
                ]);
                return redirect()->back();
            }
        }
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
