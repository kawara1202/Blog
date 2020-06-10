@extends('layouts.app')
@include('footer')
@section('content')
<div class="main">
  <div class="card devise-card">
    <div class="form-wrap">
      <div class="form-group text-center">
        <h2 class="logo-img mx-auto"></h2>
        <p class="text-secondary">友達の写真をチェックしよう</p>
      </div>
      <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" accept-charset="UTF-8">
        {{ csrf_field() }}
        
        <div class="form-group">
          <input class="form-control" placeholder="アカウント名" type="text" name="name" value="{{ old('name') }}" required>
        </div>
        
        <div class="form-group">
          <input class="form-control" placeholder="メールアドレス" autocomplete="email" type="email" name="email" value="{{ old('email') }}" required>
          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
        </div>
        
        <div class="form-group">
          <input class="form-control" placeholder="パスワード" autocomplete="off" type="password" name="password" minlength="8" required>
        </div>
        <div class="form-group">
          <input class="form-control" placeholder="パスワード確認" autocomplete="off" type="password" name="password_confirmation" minlength="8" required>
          @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
        </div>
        
        <div class="form-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="user_profile_photo" name="user_profile_photo" accept="image/jpeg,image/gif,image/png" required>
            <label class="custom-file-label" for="user_profile_photo" data-browse="参照">プロフィール画像を選択</label>
          </div>
          @if ($errors->has('user_profile_photo'))
              <span class="help-block">
                  <strong>{{ $errors->first('user_profile_photo') }}</strong>
              </span>
          @endif
        </div>
        
        <div class="actions">
          <input type="submit" name="commit" value="登録する" class="btn btn-primary w-100">
        </div>
      </form>
      <br>

      <p class="devise-link">
        アカウントをお持ちですか？
        <a href="/users/sign_in">サインインする</a>
      </p>
    </div>
  </div>
</div>
@endsection
