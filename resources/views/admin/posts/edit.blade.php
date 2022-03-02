@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col">
        <form action="{{ route('admin.posts.update', $post->slug) }}" method="post">
        @csrf
        @method('PATCH')

          <div class="mb-3">
            <select class="form-select" name="category_id">
                
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                    
                    <option @if (old('category_id', $post->category_id) == $category->id) selected @endif value="{{ $category->id }}">
                        {{ $category->name }} - {{ $category->id }}</option>
                @endforeach
            </select>
          @error('category_id')
            <div class="alert alert-danger mt-3">
                {{ $message }}
            </div>
          @enderror

        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" value={{ $post->title }} class="form-control" id="title" name="title">
          @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <h2>Author: {{Auth::user()->name}}</h2>
        </div>

        <div class="mb-3">
          <label for="content" class="form-label">Content</label>
          <input type="text" value={{ $post->content }} class="form-control" id="content" name="content">
          @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
        <a href="{{ route('admin.posts.index')}}" class="text-white fw-bold btn btn-primary m-1">Back</a>
        <input class="text-white fw-bold btn btn-primary" type="submit" value="Send">
      </form>
    </div>
  </div>
</div>
@endsection