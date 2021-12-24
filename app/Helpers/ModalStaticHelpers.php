<?php

namespace App\Helpers;


class ModalStaticHelpers{

    // Method seperti biasanya.

    /*
    |--------------------------------------------------------------------------
    | Redirect Function
    |--------------------------------------------------------------------------
    | 
    | Berisi Function bantuan untuk Redirect
    |
    */
    public static function redirect_success_with_title($title,$message){
      return redirect()->back()->with([
        'title' => $title,
        'success' => $message,
      ]);
    }

    public static function redirect_warning_with_title($title,$message){
      return redirect()->back()->with([
        'title' => $title,
        'warning' => $message,
      ]);
    }

    public static function redirect_error_with_title($title,$message){
      return redirect()->back()->with([
        'title' => $title,
        'error' => $message,
      ]);
    }

    public static function redirect_success($message){
      return redirect()->back()->with('success',$message);
    }

    public static function redirect_warning($message){
      return redirect()->back()->with('success',$message);
    }

    public static function redirect_error($message){
      return redirect()->back()->with('error',$message);
    }



}