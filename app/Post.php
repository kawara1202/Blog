<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  // belongsTo設定
  // 「１対１」→ メソッド名は単数形
  Public function user()
  {
    return $this->belongsTo('App\User');
  }
  
  // hasMany設定
  public function likes()
  {
    return $this->hasMany('App\Like');
  }
  
  //hasMany設定
  public function comments()
  {
    return $this->hasMany('App\Comment');
  }
  
  // ログインユーザーがその投稿をいいねしているかどうかを調べる
  Public function likedBy($user)
  {
    // Likeテーブルのuser_idとpost_idが一致しているレコードを探す
    // ようするにselect * from like where user_id =  $user_id and post_id = $post_id
    return Like::where('user_id', $user->id)->where('post_id', $this->id);
  }
}
