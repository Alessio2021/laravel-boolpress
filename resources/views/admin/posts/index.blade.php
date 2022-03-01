@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="list-group">
            @foreach ($posts as $post)
                <li class="mt-5 mb-3 list-group-item">
                    <div>
                        <h2>{{ $post->title }}</h2>
                        <h4>{{ $post->author }}</h4>
                        <p>{{ $post->content }}</p>
                        <h6>{{ $post->slug }}</h6>
                        <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-success">View</a>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-success">Modify</a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger m-1" type="submit" value="Delete">
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
        <div>
            {{ $posts->links() }}
        </div>
    </div>
@endsection