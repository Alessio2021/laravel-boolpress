@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="list-group">
            @foreach ($posts as $post)
                <li class="mt-5 mb-3 list-group-item shadow-lg">
                    <div class="row">
                        <div class="col-11">
                            <h2>{{ $post->title }}</h2>
                            <h4>{{ $post->author }}</h4>
                            <p>{{ $post->content }}</p>
                            <h6>{{ $post->slug }}</h6>
                        </div>
                        <div class="col-1">
                            <a href="{{ route('admin.posts.show', $post->slug) }}" class="mt-1 w-100 btn btn-success">View</a>
                            <a href="{{ route('admin.posts.edit', $post->slug) }}" class="mt-1 w-100 btn btn-success">Modify</a>
                            <form action="{{ route('admin.posts.destroy', $post->slug) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input class="mt-1 w-100 btn btn-danger" type="submit" value="Delete">
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        <div>
            {{ $posts->links() }}
        </div>
    </div>
@endsection