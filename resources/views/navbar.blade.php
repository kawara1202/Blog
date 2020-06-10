@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar__brand navbar__mainLogo" href="/"></a>
        
        <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
        <!--  <span class="navbar-toggler-icon"></span>-->
        <!--</button>-->
        
        <!--<div class="collapse navbar-collapse" id="navbarSupportedContent">-->
        <div class="navbar-nav ml-auto align-items-center float-right">
            <a class="btn btn-primary" href="/posts/new">投稿</a>
        </div>
        <div class="navbar-nav ml-3 align-items-center float-right">
            <a class="nav-link commonNavIcon profile-icon" href="/users/{{ Auth::user()->id }}"></a>
        </div>

      </div>
    </nav>
@endsection