@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col">
        <form action="{{ route('admin.posts.update', $post) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

            {{-- select --}}
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

            {{-- CHECKBOX --}}

            <fieldset class="mb-3">
                <legend>Tags</legend>
                {{-- se abbiamo gia compilato il form e siamo tornati indietro per validazione errata allora facciamo un foreach e controlliamo old('tags') --}}
                @if ($errors->any())
                    @foreach ($tags as $tag)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" name="tags[]"
                                {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexCheckDefault">
                                {{ $tag->name }}
                            </label>
                        </div>
                    @endforeach
                @else
                    {{-- Altrimenti prendiamo i dati dal db e checchiamo i nostri checkbox corrispondenti --}}
                    @foreach ($tags as $tag)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" name="tags[]"
                                {{ $post->tags()->get()->contains($tag->id)? 'checked': '' }}>
                            <label class="form-check-label" for="flexCheckDefault">
                                {{ $tag->name }}
                            </label>
                        </div>
                    @endforeach
                @endif
            </fieldset>

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

        @if (!empty($post->image))
        <div class="mb-3">
          <img class="w-50" src="{{asset('storage/' . $post->image)}}" alt="{{$post->title}}">
        @endif
        <div class="mb-3">
          <label for="image" class="form-label">Seleziona File</label>
          <input class="form-control" type="file" id="image" name="image">
          @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
        <a href="{{ route('admin.posts.index')}}" class="text-white fw-bold btn btn-primary m-1">Back</a>
        <input class="text-white fw-bold btn btn-primary" type="submit" value="Send">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection