<?php

namespace App\Http\Controllers;

use App\Helpers\ModalStaticHelpers;
use App\Jobs\LupaPasswordJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LupaPasswordController extends Controller
{
    public function reset(Request $request){
        $cek = User::where('email',$request->email)->first();
        $email = $request->email;
        if($cek != null){
            // dd('ada');
            dispatch(new LupaPasswordJob($email));
            return redirect()->back()->with([
                'done' => 'berhasil',
              ]);
        }else{
            // dd('ndak ada');
            return ModalStaticHelpers::redirect_error_with_title('Reset Password','tidak ada email tersebut');
        }
    }

    public function reset_done(Request $request){
        $cek = User::where('email',$request->email)->first();
        $email = $request->email;
        if($cek != null){
            // dd('ada');
            dispatch(new LupaPasswordJob($email));
            return ModalStaticHelpers::redirect_success_with_title('Reset Password',"Silahkan cek email Anda (Jika tidak di pesan masuk, silahkan cek di spam)");
        }else{
            // dd('ndak ada');
            return ModalStaticHelpers::redirect_error_with_title('Reset Password','tidak ada email tersebut');
        }
    }

    public function edit($email){
        $email = Crypt::decrypt($email);

        return view('auth.reset-password',compact('email'));
    }

    public function update(Request $request){
        $rules = [
            'email'                => ['required'],
            'password_baru'        => ['required'],
            'password_konfirmasi'  => ['same:password_baru'],
        ];
 
        $messages = [
            'email.required'           => 'Email wajib diisi.',
            'password_baru.required'   => 'Password baru wajib diisi.',
            'password_konfirmasi.same' => 'Password konfirmasi tidak sama.',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
         
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        User::where('email',$request->email)->update([
            'password' => Hash::make($request->password_baru),
        ]);

        return redirect('/login');
    }
}
