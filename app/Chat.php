<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Chat extends Model
{
    protected $fillable = ['comment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * リプライにLIKEを付いているかの判定
     *
     * @return bool true:Likeがついてる false:Likeがついてない
     */
    public function is_liked_by_auth_user()
    {
        $id = Auth::id();

        $likers = array();
        foreach ($this->likes as $like) {
            array_push($likers, $like->user_id);
        }

        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }
}
