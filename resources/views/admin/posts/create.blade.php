@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col">
        <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf
        @method('POST')

        
        {{-- SELECT --}}
        <div class="mb-3">
          <select class="form-select" name="category_id">
            
            <option value="">Select a category</option>
            @foreach ($categories as $category)
            
            <option @if (old('category_id') == $category->id) selected @endif value="{{ $category->id }}">
              {{ $category->name }}</option>
              @endforeach
            </select>
            @error('category_id')
            <div class="alert alert-danger mt-3">
              {{ $message }}
            </div>
            @enderror
          </div>
          
          {{-- CHECKBOX --}}
        @error('tags.*')
            <div class="alert alert-danger mt-3">
                {{ $message }}
            </div>
        @enderror
        <fieldset class="mb-3">
            <legend>Tags</legend>
            @foreach ($tags as $tag)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" name="tags[]"
                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexCheckDefault">
                        {{ $tag->name }}
                    </label>
                </div>
            @endforeach
        </fieldset>

        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title">
          @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <h2>Author: {{Auth::user()->name}}</h2>
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