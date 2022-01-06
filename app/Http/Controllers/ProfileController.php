<?php

namespace App\Http\Controllers;

use App\Helpers\ModalStaticHelpers;
use App\Http\Requests\EditProfileRequest;
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
        $forums = Forum::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        return view('pages.profile.index',compact('forums','count'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EditProfileRequest $request)
    {
        $p = User::find(Auth::user()->id);
        $p->name = $request->name;

        if($request->hasFile('profile')){
            $request->file('profile')->move('img/avatar/', $request->file('profile')->getClientOriginalName());
            $p->avatar = $request->file('profile')->getClientOriginalName();
            if($request->oldimg != 'default.png'){
                File::delete('img/avatar/'.$request->oldimg);
            }
        }
        $p->save();
        
        return ModalStaticHelpers::redirect_success_with_title('Profile','Profile berhasil di simpan');
    }
}
