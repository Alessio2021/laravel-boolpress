@extends('layouts.app')

@section('content')
    <div class="mt-5 container card">
        <div class="row">
            <div class="col">
                        <h2>{{ $post->title }}</h2>
                        <h4>{{ $post->author }}</h4>
                        <p>{{ $post->content }}</p>
                        <h6>{{ $post->slug }}</h6>
            </div>
        </div>
    </div>
@endsection