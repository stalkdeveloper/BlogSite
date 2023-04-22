{{--  --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@foreach($comments as $comment)
    <div class="display-comment" 
    @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <strong class="fas fa-user-tie">@if($comment->user)
            {{ $comment->user->firstname }}
            @endif </strong>
            <span >
                <span class="far fa-clock">
                {{$comment->created_at->diffForHumans()}}
            </span><br>
        <p class="">{{ $comment->comment }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="comment" placeholder="Comment Reply" class="form-control" />
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Reply"/>
            </div>
            <hr />
        </form>
        @include('posts.comments', ['comments' => $comment->replies])
    </div>
@endforeach