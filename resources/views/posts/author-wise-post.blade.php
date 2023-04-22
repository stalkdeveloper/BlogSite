@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    <body>
        <div class="container">
            <div class="row my-5">
               <div class="col p-2">
                <h1>Posts</h1>
               </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <h3>Author: {{$user->firstname}}</h3>
                    @forelse ($user->posts as $post)
                    <div class="card my-2">
                       <div class="card-body">
                        <span>
                            <i class="fa fa-user"></i> {{$user->firstname}}
                        </span>
                        <span><i class="fa fa-calendar"></i>
                             {{$post->created_at->diffForHumans()}}
                        </span>
                        <h2 class="text-dark" href="{{route('home', [$post->firstname])}}">{{$post->user->firstname}}</h2>
                        <h4 class="text-success"><b>{{$post->meta_title}}</b></h4>
                        <div class="card-text">{{$post->body}}</div>
                      </div>
                    </div>
                    
                    @empty
                        
                    @endforelse
                </div>
            </div>
        </div>
    </body>
</html>
@endsection
