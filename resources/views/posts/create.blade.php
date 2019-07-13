@extends ('layouts.app')

@section ('content')
    <div class="container">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">SUBMIT</button>
            </div>
        </form>
    </div>
@endsection
