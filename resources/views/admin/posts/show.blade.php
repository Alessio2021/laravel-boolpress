@extends('layouts.app')

@section('content')
    <div class="mt-5 container ">
        <div class="row">
            <div class="col">
                <img class="w-50" src="{{asset('storage/' . $post->image)}}" alt="{{$post->title}}">
                <h2>Title: {{ $post->title }}</h2>
                <h4>Author: {{ $post->author }}</h4>
                <p>Content: {{ $post->content }}</p>
                <h6>Slug: {{ $post->slug }}</h6>
                <h6>Category: {{ $post->category()->first()->name }}</h6>
                <a href="{{ url()->previous() }}" class="text-white fw-bold btn btn-primary mt-2">Back</a>
            </div>
        </div>
    </div>
@endsection