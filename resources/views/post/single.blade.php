
@extends('layouts.app')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
    .title{
    font-size: 20px;
    font-weight: 800;
    background: #f3f3f3;
    color: #0d6efd;
    }
    .avatar {
  position: relative;
  display: inline-block;
  width: 3rem;
  height: 3rem;
  font-size: 1.25rem;
}

.avatar-img,
.avatar-initials,
.avatar-placeholder {
  width: 100%;
  height: 100%;
  border-radius: inherit;
}

.avatar-img {
  display: block;
  -o-object-fit: cover;
  object-fit: cover;
}

.avatar-initials {
  position: absolute;
  top: 0;
  left: 0;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  -ms-flex-pack: center;
  justify-content: center;
  color: #fff;
  line-height: 0;
  background-color: #a0aec0;
}

.avatar-placeholder {
  position: absolute;
  top: 0;
  left: 0;
  background: #a0aec0
    url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='%23fff' d='M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z'/%3e%3c/svg%3e")
    no-repeat center/1.75rem;
}

.avatar-indicator {
  position: absolute;
  right: 0;
  bottom: 0;
  width: 20%;
  height: 20%;
  display: block;
  background-color: #a0aec0;
  border-radius: 50%;
}

.avatar-group {
  display: -ms-inline-flexbox;
  display: inline-flex;
}

.avatar-group .avatar + .avatar {
  margin-left: -0.75rem;
}

.avatar-group .avatar:hover {
  z-index: 1;
}

.avatar-sm,
.avatar-group-sm > .avatar {
  width: 2.125rem;
  height: 2.125rem;
  font-size: 1rem;
}

.avatar-sm .avatar-placeholder,
.avatar-group-sm > .avatar .avatar-placeholder {
  background-size: 1.25rem;
}

.avatar-group-sm > .avatar + .avatar {
  margin-left: -0.53125rem;
}

.avatar-lg,
.avatar-group-lg > .avatar {
  width: 4rem;
  height: 4rem;
  font-size: 1.5rem;
}

.avatar-lg .avatar-placeholder,
.avatar-group-lg > .avatar .avatar-placeholder {
  background-size: 2.25rem;
}

.avatar-group-lg > .avatar + .avatar {
  margin-left: -1rem;
}

.avatar-light .avatar-indicator {
  box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.75);
}

.avatar-group-light > .avatar {
  box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.75);
}

.avatar-dark .avatar-indicator {
  box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.25);
}

.avatar-group-dark > .avatar {
  box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.25);
}

</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                <img src="{{ url($post->path) }}" style="width:100%">
                    <p class="title">{{ $post->title }}</p>
                    <p>{{ $post->description }}</p>
                </div>
      
               <div class="card-body">
                <h6>Comments</h6>
            
                @include('post.partials.replies', ['comments' => $post->comments, 'post_id' => $post->id])

                <hr />
               </div>

               <div class="card-body">
                <h5>Leave a comment</h5>
                <form name="frm_comment" id="frm_comment" action="{{ route('comment.add') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="comment" class="form-control" />
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                        
                    </div> <br>
                    <div class="form-group">
                        <button type="submit" id="comment" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;">Add Comment</button>
                    </div>
                </form>
               </div>

       
             <div id="comments-div">
            </div>
            

          <div class="my-3 bg-white" style="height: 1px; width: 100%;"></div>
      

            </div>
        </div>
    </div>
</div>
@endsection 


@section('script')
<script>

</script>
@endsection
