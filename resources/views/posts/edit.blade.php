@extends ('layouts.app')

@section ('content')
    <div class="container">
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}">
            </div>
            <div class="form-group">
                <textarea name="description" class="form-control">{{ old('description', $post->description) }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">SUBMIT</button>
            </div>
        </form>
    </div>
@endsection
