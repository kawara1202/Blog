@extends('layouts.app')
@include('navbar')
@include('footer')
@section('content')
<div class="col-md-offset-2 mb-4 edit-profile-wrapper">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="profile-form-wrap">
        <form class="edit_user" enctype="multipart/form-data" action="/users/update" accept-charset="UTF-8" method="post">
          <input name="utf8" type="hidden" value="✓" />
          <input type="hidden" name="id" value="{{ $user->id }}" />
          {{csrf_field()}} 
          <div class="form-group">
            <label for="user_profile_photo">プロフィール画像</label><br>
            @if ($user->image)
              <img class="round-img" src="data:image/png;base64,{{ $user->image }}" alt="avatar" />
            @else
              <img class="round-img" src="{{ asset('/images/blank_profile.png') }}" alt="avatar" />
            @endif
            <div class="custom-file mt-1">
              <input type="file" class="custom-file-input" id="user_profile_photo" name="user_profile_photo" accept="image/jpeg,image/gif,image/png">
              <label class="custom-file-label" for="user_profile_photo" data-browse="参照">プロフィール画像を選択</label>
            </div>
            @if ($errors->has('user_profile_photo'))
                <span class="help-block">
                    <strong>{{ $errors->first('user_profile_photo') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group">
            <label for="name">アカウント名</label>
            <input autofocus="autofocus" class="form-control" type="text" value="{{ old('name',$user->name) }}" name="name" />
            @if ($errors->has('name'))
              <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
            @endif
          </div>

          <div class="form-group">
            <label for="email">メールアドレス</label>
            <input autofocus="autofocus" class="form-control" type="email" value="{{ old('email',$user->email) }}" name="email" />
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group">
            <label for="password">パスワード</label>
            <input autofocus="autofocus" class="form-control" type="password" name="password" />
          </div>

          <div class="form-group">
            <label for="password_confirmation">パスワード確認</label>
            <input autofocus="autofocus" class="form-control" type="password" name="password_confirmation" />
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>

          <input type="submit" name="commit" value="変更する" class="btn btn-primary" data-disable-with="変更する" />
        </div>
      </form>
    </div>
  </div>
</div>
@endsection