@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('posts.item', ['post' => $post, 'single' => true])
                <div class="comments-wrapper">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Comments</h4>
                            @if (count($post->comments) > 0)
                                @foreach ($post->comments as $comment)
                                    <div class="panel panel-default">
                                        <div class="panel-heading">{{ $comment->user->name }}</div>
                                        <div class="panel-body">{!! nl2br($comment->body) !!}</div>
                                        <div class="panel-footer">
                                            <p>Created at {{ $comment->created_at }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>There are not comments.</p>
                            @endif
                        </div>
                        <div class="panel-body">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <p>Unable to create comment.</p>
                                    <p>{{ $errors->first() }}</p>
                                </div>
                            @endif
                            <form action="{{ url('/comments') }}" class="form" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <div class="form-group{{ $errors->has('comment_text') ? ' has-error' : '' }}">
                                    <label for="commentTextInput">Comment</label>
                                    <textarea name="comment_text" id="commentTextInput" cols="30" rows="3" class="form-control">{{ old('comment_text') }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Send Comment</button>
                            </form>
                        </div>
                    </div>
                </div>
                <p>
                    <a href="{{ url('/posts') }}">Back to all Posts</a>
                </p>
            </div>
        </div>
    </div>
@endsection
