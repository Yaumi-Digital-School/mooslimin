<?php

namespace App\Http\Controllers;

use App\Helpers\ModalStaticHelpers;
use App\Jobs\LupaPasswordJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class LupaPasswordController extends Controller
{
    public function reset(Request $request){
        $cek = User::where('email',$request->email)->first();

        if($cek != null){
            // dd('ada');
            dispatch(new LupaPasswordJob($request->email));
            return ModalStaticHelpers::redirect_success_with_title('Reset Password'," $request->email Anda ");
        }else{
            // dd('ndak ada');
            return ModalStaticHelpers::redirect_error_with_title('Reset Password','tidak ada email tersebut');
        }
    }

    public function update($email){
        $email = Crypt::decrypt($email);

        return view('auth.reset-password',compact('email'));
    }
}
