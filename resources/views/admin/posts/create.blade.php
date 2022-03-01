@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col">
        <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf
        @method('POST')
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title">
          @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="author" class="form-label">Author</label>
          <input type="text" class="form-control" id="author" name="author">
          @error('author')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="content" class="form-label">Content</label>
          <input type="text" class="form-control" id="content" name="content">
          @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
        <a href="{{ route('admin.posts.index') }}" class="text-light fw-bold btn btn-primary m-1">Back</a>
        <input class="text-light fw-bold btn btn-primary" type="submit" value="Send">
      </form>
    </div>
  </div>
</div>
@endsection