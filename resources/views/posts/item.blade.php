<div class="panel panel-default">
    <div class="panel-heading">
        <h2>
            <a href="{{ url('/posts/'.$post->id) }}">{{ $post->title }}</a>
        </h2>
    </div>
    <div class="panel-body">
        {!! nl2br($post->body) !!}
    </div>
    <div class="panel-footer">
        <p>Author: {{ $post->user->name }}, created at: {{ $post->created_at }}</p>
    </div>
</div>
