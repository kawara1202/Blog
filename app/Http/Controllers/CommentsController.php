<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Auth;
use Illuminate\Http\Request;
use Validator;

// コメント関連のコントローラ
class CommentsController extends Controller
{
    //コンストラクタ （このクラスが呼ばれると最初にこの処理をする）
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }
    
    // コメントの投稿
    public function store(Request $request)
    {
        // Commentモデル作成
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        // 「/」 ルートにリダイレクト
        return redirect('/');
    }
    
    // コメントの削除
    public function destroy(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        $comment->delete();
        return redirect('/');
    }
}
