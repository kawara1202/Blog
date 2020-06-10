<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

// ユーザ情報関連のコントローラ
class UsersController extends Controller
{
    //コンストラクタ （このクラスが呼ばれると最初にこの処理をする）
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }
    
    public function show($user_id)
    {
        $user = User::where('id', $user_id)->firstOrFail();
            
         // テンプレート「user/show.blade.php」を表示します。
        return view('user/show', ['user' => $user]);
    }
    
    public function edit()
    {
        $user = Auth::user();
            
         // テンプレート「user/edit.blade.php」を表示します。
        return view('user/edit', ['user' => $user]);
    }
    
    // プロフィールの更新
    public function update(Request $request)
    {
        //バリデーション（入力値チェック）
        $validator = Validator::make($request->all() , [
            'name'     => 'required|string|max:255',
            'email'    => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($request->id),
            ],
            'password' => 'sometimes|nullable|string|min:8|confirmed',
            'user_profile_photo' => 'sometimes|nullable|file|image|mimes:jpeg,gif,png',
        ]);
        
        //バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
          return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        
        logger(gettype($request->user_profile_photo));
        
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        
        // パスワード 変更時のみ更新
        if (strlen($request->password) > 0) {
            $user->password = bcrypt($request->password);
        }
        
        // プロフィール画像 変更時のみ更新
        if ($request->user_profile_photo !=null) {
            $user->image = base64_encode(file_get_contents($request->user_profile_photo));
        }
        
        $user->save();

        return redirect('/users/'.$request->id);
    }
}
