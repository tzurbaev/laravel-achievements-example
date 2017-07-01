<div class="panel panel-default">
    <div class="panel-heading">
        @if (isset($single) && $single)
            <h2 style="margin:0">{{ $post->title }}</h2>
        @else
            <a href="{{ url('/posts/'.$post->id) }}">{{ $post->title }}</a>
        @endif
    </div>
    <div class="panel-body">
        {!! nl2br($post->body) !!}
    </div>
    <div class="panel-footer">
        <p>Author: {{ $post->user->name }}, created at: {{ $post->created_at }}</p>
    </div>
</div>
