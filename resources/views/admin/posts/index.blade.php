@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="list-group">
            @foreach ($posts as $post)
                <li class="mt-5 mb-3 list-group-item shadow-lg">
                    <div class="row">
                        <div class="col-11">
                            <img class="w-50" src="{{asset('storage/' . $post->image)}}" alt="{{$post->title}}">
                            <h2>Title: {{ $post->title }}</h2>
                            <h4>Author: {{ $post->author }}</h4>
                            <p>Content: {{ $post->content }}</p>
                            <h6>Slug: {{ $post->slug }}</h6>
                            <h6>Category: {{ $post->category()->first()->name }}</h6>
                            <h6>Tags:   
                                @foreach ($post->tags()->get() as $tag)
                                {{ $tag->name }}
                                @endforeach
                            </h6>

                        </div>
                        <div class="col-1">
                            <a href="{{ route('admin.posts.show', $post->slug) }}" class="mt-1 w-100 btn btn-success">View</a>

                            @if (Auth::user()->id === $post->user_id)
                                <a href="{{ route('admin.posts.edit', $post->slug) }}" class="mt-1 w-100 btn btn-success">Modify</a>
                            @endif
                                
                            @if (Auth::user()->id === $post->user_id)
                                <form action="{{ route('admin.posts.destroy', $post->slug) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input class="mt-1 w-100 btn btn-danger" type="submit" value="Delete">
                                </form>
                            @endif

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