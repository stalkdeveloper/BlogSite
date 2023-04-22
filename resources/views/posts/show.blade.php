@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">    

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $post->title }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta Title:</strong>
                {{ $post->meta_title }}
            </div>
        </div>        

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Body:</strong>
                {{ $post->body }}
            </div>
        </div>
        <hr>
        <div class="col-xs-4 col-sm-4 col-md-4">
        @include('posts.comments', ['comments' => $post->comments, 'post_id' => $post->id])
        <h4>Total Fresh Comments :{{$total}}</h4>
            <form method="post" action="{{ route('comments.store') }}">
                @csrf
            <div class="form-group">
                <input type="text" name="comment" placeholder="Leave Fresh Comment" class="form-control" />
                <input type="hidden" name="post_id" value="{{ $post->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Add Comment"/>
            </div>
            </form>
        </div>

    </div>
</div>
    @endsection