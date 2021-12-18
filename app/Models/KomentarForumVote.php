<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarForumVote extends Model
{
    use HasFactory;

    protected $table = 'komentar_forum_vote';
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function komentar(){
        return $this->belongsTo(KomentarForum::class);
    }
}
