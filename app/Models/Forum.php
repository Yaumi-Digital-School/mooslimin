<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $table = "forum";
    protected $guarded = ['id'];

    public function get_img_forum(){
        if(!$this->image){
            return asset('img/umum/default.png');
        }

        return asset('img/forum/'.$this->image);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function komentar(){
        return $this->hasMany(KomentarForum::class);
    }

    public function vote(){
        return $this->hasMany(ForumVote::class);
    }
}
