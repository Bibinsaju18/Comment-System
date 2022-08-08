<style>
    .comment{
    min-height: 40px;
    padding: 12px 8px;
    width: 100%;
    border: none;
    resize: none;
    }
  
</style>

@foreach($comments as $comment)
<div class="display-comment">
    <strong>{{ $comment->user->name }}</strong>
    <p>{{ $comment->comment }}</p>
    <a href="" id="reply"></a>
    <form method="post" action="{{ route('reply.add') }}">
        @csrf
        <div class="form-group">
            <input type="hidden" name="post_id" value="{{ $post_id }}" />
            <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
        </div>
       
    </form>
    
</div>
@endforeach 


