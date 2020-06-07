<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  // belongsTo設定
  // 「１対１」→ メソッド名は単数形
  // ここ１対１じゃなくて多対１では？？？
  Public function user()
  {
    return $this->belongsTo('App\User');
  }
  
  // belongsTo設定
  // 「１対１」→ メソッド名は単数形
  Public function post()
  {
    return $this->belongsTo('App\Post');
  }
}
