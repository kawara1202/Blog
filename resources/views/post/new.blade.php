@extends('layouts.app')
@section('content')
<div class="panel-body">

<div class="d-flex flex-column align-items-center mt-3">
  <div class="col-xl-7 col-lg-8 col-md-10 col-sm-11 post-card">
    <div class="card">
      <div class="card-header">
        投稿画面
      </div>
      <div class="card-body">
        <form class="upload-images p-0 border-0" id="new_post" enctype="multipart/form-data" action="{{ url('posts')}}" accept-charset="UTF-8" method="POST">
        {{csrf_field()}} 
          <div class="form-group">
            <div class="col-auto">
              @if ($user->image)
                <p>
                  <img class="post-profile-icon round-img" src="data:image/png;base64,{{ $user->image }}"/>
                </p>
                @else
                  <img class="post-profile-icon round-img" src="{{ asset('/images/blank_profile.png') }}"/>
              @endif
            </div>
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="タイトル" type="text" name="caption" value="{{ old('caption') }}" required minlength="10" />
            @if ($errors->has('caption'))
              <span class="help-block">
                  <strong>{{ $errors->first('caption') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group">
            <div class="col custom-file">
              <input type="file" class="custom-file-input" id="photo" name="photo" accept="image/jpeg,image/gif,image/png" required>
              <label class="custom-file-label" for="photo" data-browse="参照">投稿画像を選択</label>
            </div>
            @if ($errors->has('photo'))
              <span class="help-block">
                  <strong>{{ $errors->first('photo') }}</strong>
              </span>
            @endif
          </div>
          
          <div class="actions">
            <input type="submit" name="commit" value="投稿する" class="btn btn-primary" data-disable-with="投稿する" />
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>
@endsection