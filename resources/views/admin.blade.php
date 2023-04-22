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
    <div class="row justify-content-center">
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
                            <th width="100px">Post Id</th>       
                            <th>Title</th>
                            <th>Meta Title</th>
                            <th>Body</th>
                            <th width="200px">Action</th>
                        </tr>
                
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{$post->pid}}</td>
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
