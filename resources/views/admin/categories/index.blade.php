@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="list-group">
            @foreach ($categories as $category)
                <li class="mt-5 mb-3 list-group-item shadow-lg">
                    <div class="row">
                        <div class="col">
                            <h2>{{ $category->name }}</h2>
                            <h4>{{ $category->category_id }}</h4>
                            <p>{{ $category->created_at }}</p>
                            <h6>{{ $category->update_at }}</h6>
                            <a class="btn btn-primary" href="{{ route('admin.categories.show', $category->slug) }}">View</a>
                            <form class="mt-1" action="{{ route('admin.categories.destroy', $category->slug) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Delete">
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        <div>
            {{ $categories->links() }}
        </div>
    </div>
@endsection