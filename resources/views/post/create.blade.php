
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
   
        <div class="col-md-8">
        @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> {{ session()->get('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong> One or more field(s) have error!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
            <div class="card">
                <div class="card-header">Create Post</div>
                <div class="card-body">

                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
                        <div class="form-group">
                            @csrf
                            <label class="label">Post Title: </label>
                            <input type="text" name="title" class="form-control" required/>
                        </div><br>
                        <div class="form-group">
                             <label class="label">Post Description: </label><br>
                             <textarea name="description" id="" cols="30" rows="10" class="form-control" required></textarea>
                        </div><br>
                        <div clas="form-group">
                        <label class="label">Post Image: </label><br>
                           <input type="file" name="image" class="form-control" required>
                        </div><br>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Create post"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 