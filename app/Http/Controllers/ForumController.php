<?php

namespace App\Http\Controllers;

use App\Helpers\ModalStaticHelpers;
use App\Http\Requests\CreateForumRequest;
use App\Models\Forum;
use App\Models\ForumVote;
use App\Models\KomentarForum;
use App\Models\KomentarForumVote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $forums = Forum::orderBy('count_vote','DESC')
                        ->orderBy('created_at','DESC')
                        ->get();
        return view('pages.forum.index',compact('forums','count','upvote','downvote'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateForumRequest $request)
    {
        $forum = new Forum;
        $forum->user_id = Auth::user()->id;
        $forum->desc = $request->desc;

        if($request->hasFile('image')){
            $request->file('image')->move('img/forum/', $request->file('image')->getClientOriginalName());
            $forum->image = $request->file('image')->getClientOriginalName();
        }
        $forum->save(); 

        return ModalStaticHelpers::redirect_success_with_title('Postingan','Postingan berhasil di buat');
    }

    public function add_comment(Request $request){

        $request->request->add(['user_id' => auth()->user()->id]);
        KomentarForum::create($request->all());
        
        $forum = Forum::find($request->forum_id);
        $forum->count_vote += 1;
        $forum->save();
        
        return ModalStaticHelpers::redirect_success_with_title('Komentar','Komentar berhasil di buat');
    }

    public function delete_comment($id){

        $komentar = KomentarForum::find($id);
        $komentar->delete($komentar);

        return ModalStaticHelpers::redirect_success_with_title('Komentar','Komentar berhasil di hapus');
    }
    
    public function forum_vote(Request $request){
        $forum = Forum::find($request->forum_id);
        $request->request->add(['user_id' => auth()->user()->id]);
        $cek = ForumVote::where([
            ['user_id',auth()->user()->id],
            ['forum_id',$request->forum_id]
        ])->first();
        if($cek == null){
            ForumVote::create($request->all());
            if($request->type == 'upvote'){
                $forum->count_vote += 1;
                $forum->save();
            }
            return ModalStaticHelpers::redirect_success_with_title('Vote Postingan','Berhasil vote');
        }else{
            if($cek->type == $request->type){
                return ModalStaticHelpers::redirect_warning_with_title('Vote Postingan','Kamu sudah vote postingan ini');
            }else{
                ForumVote::where([
                    ['user_id',auth()->user()->id],
                    ['forum_id',$request->forum_id]
                ])->update([
                    'type' => $request->type,
                ]);

                if($request->type == 'upvote'){
                    $forum->count_vote += 1;
                    $forum->save();
                }
                return ModalStaticHelpers::redirect_success_with_title('Vote Postingan','Berhasil vote');
            }
        }
    }

    public function komentar_vote(Request $request){
        $request->request->add(['user_id' => auth()->user()->id]);
        $cek = KomentarForumVote::where([
            ['user_id',auth()->user()->id],
            ['komentar_forum_id',$request->komentar_forum_id]
        ])->first();
        if($cek == null){
            KomentarForumVote::create($request->all());
            return ModalStaticHelpers::redirect_success_with_title('Vote Komentar','Berhasil vote');
        }else{
            if($cek->type == $request->type){
                return ModalStaticHelpers::redirect_warning_with_title('Vote Komentar','Kamu sudah vote komentar ini');
            }else{
                KomentarForumVote::where([
                    ['user_id',auth()->user()->id],
                    ['komentar_forum_id',$request->komentar_forum_id]
                ])->update([
                    'type' => $request->type,
                ]);
                return ModalStaticHelpers::redirect_success_with_title('Vote Komentar','Berhasil vote');
            }
        }
    }
}
