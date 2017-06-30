@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ isset($latest) && $latest ? 'Latest Posts' : 'Posts' }}
                </div>
                <div class="panel-body">
                    @if (count($posts) > 0)
                        <div class="posts-list">
                            @foreach ($posts as $post)
                                @include('posts.item', ['post' => $post])
                            @endforeach
                        </div>
                    @else
                        <p>There are no posts yet. <a href="{{ url('/posts/create') }}">Write first post?</a></p>
                    @endif
                </div>
                @if (isset($latest) && $latest)
                    <div class="panel-footer">
                        <p>
                            <a href="{{ url('/posts') }}" class="btn btn-primary">Go to all posts</a>
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
