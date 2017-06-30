@if (isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        <p>Unable to create new Post.</p>
    </div>
@endif

<form action="{{ url('/posts'.(isset($post) ? '/'.$post->id : '')) }}" method="POST" class="form">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label for="inputTitle">Post Title</label>
        <input type="text" id="inputTitle" name="title" class="form-control" value="{{ old('name', $post->title ?? '') }}">
        @if ($errors->has('title'))
            <span class="help-block">{{ $errors->first('title') }}</span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
        <label for="inputBody">Post Body</label>
        <textarea name="body" id="inputBody" cols="30" rows="10" class="form-control">{{ old('body', $post->body ?? '') }}</textarea>
        @if ($errors->has('body'))
            <span class="help-block">{{ $errors->first('body') }}</span>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Create Post</button>
    <a href="{{ url('/posts') }}" class="btn btn-default">Cancel</a>
</form>
