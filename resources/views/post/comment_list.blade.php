@foreach ($post->comments->sortByDesc('created_at') as $comment) 
  <div class="mb-2">
    @if ($comment->user->id == Auth::user()->id)
      <p class="delete-comment" onClick="comment_delete({{$comment->id}});" data-remote="true" rel="nofollow" data-method="delete"></p>
    @endif
    <span>
      <strong>
        <a class="no-text-decoration black-color" href="/users/{{ $comment->user->id }}">{{ $comment->user->name }}</a>
      </strong>
    </span>
    <span>{{ $comment->comment }}</span>
  </div>
@endforeach