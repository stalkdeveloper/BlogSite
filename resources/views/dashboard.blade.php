@extends('layouts.app')
@section('content')
<style>
    #content > div > div > div > div > div.card-body > nav > div.hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between > div:nth-child(1)
    {
        display: none;
    }

    #content > div > div > div > div > div.card-body > nav > div.hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between > div:nth-child(2)
    {
        display: none;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    Total Posts
                    <h2> Updating..!! </h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="/" class="small text-black stretched-link"> Post Read.!!</a>
                    <div class="small text-white">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    Total Comments
                    <h2>{{ $comments }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="/" class="small text-black stretched-link">Read Post - Give Comments</a>
                    <div class="small text-white">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    Total Users
                    <h2>{{ $users }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="/" class="small text-black stretched-link"> You are the also user.!!</a>
                    <div class="small text-white">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">{{ __('All Posts') }}</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>Id</th>    
                            <th>Title</th>
                            <th>Meta Title</th>
                            <th>Body</th>
                            <th width="200px">Action</th>
                        </tr>
                
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->meta_title }}</td>
                            <td>{{ $post->body }}</td>
                            <td>            
                                <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>
                                @can('post-edit')
                                <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                                @endcan 
                                
                            </td>
                        </tr>
                        @endforeach
                    </table>
                
                    {{-- {!! $posts->links() !!} --}}
                    {{$posts->links()}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
