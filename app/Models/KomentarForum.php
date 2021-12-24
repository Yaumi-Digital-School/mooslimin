<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarForum extends Model
{
    use HasFactory;

    protected $table = 'komentar_forum';
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function forum(){
        return $this->belongsTo(Forum::class);
    }

    public function child(){
        return $this->hasMany(KomentarForum::class,'parent');
    }
}
