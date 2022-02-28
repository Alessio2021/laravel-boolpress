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
                    </div>
                </li>
            @endforeach
        </ul>
        <div>
            {{$posts->links()}}
        </div>
    </div>
@endsection