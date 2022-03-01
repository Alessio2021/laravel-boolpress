@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col">
        <form action="{{ route('admin.posts.update', $post) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" value={{ $post->title }} class="form-control" id="title" name="title">
          @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="author" class="form-label">Author</label>
          <input type="text" value={{ $post->author }} class="form-control" id="author" name="author">
          @error('author')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="content" class="form-label">Content</label>
          <input type="text" value={{ $post->content }} class="form-control" id="content" name="content">
          @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">

        <input class="btn btn-primary" type="submit" value="Send">
      </form>
    </div>
  </div>
</div>
@endsection