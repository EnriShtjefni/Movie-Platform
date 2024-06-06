@extends('layouts.layout')

@section('cards-field')
    @include('movies.filter')
    <div class="rounded-square">
        <p class="latest-movies">Latest Movies</p>
        <hr class="divider">
        <div class="cards-container">
            @if ($movies->isEmpty())
                <p>No movies found.</p>
            @else
                <div class="row" id="movie-list">
                    @foreach ($movies as $movie)
                        <div class="col-sm">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title"><strong>Title:</strong> {{ $movie->title }}</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text"><strong>Description:</strong> {{ $movie->description }}</p>
                                </div>
                                <div class="card-body">
                                    <p class="card-text"><strong>Year:</strong> {{ $movie->year }}</p>
                                </div>
                                <div class="card-body">
                                    <p class="card-text"><strong>Status:</strong> {{ $movie->status }}</p>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        <strong>Company:</strong> {{ $movie->company->name }}
                                    </p>
                                </div>
                                <div class="card-body">
                                    <p class="card-text"><strong>Categories:</strong>
                                        @foreach ($movie->categories as $category)
                                            {{ $category->name }}
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-sm">
                                            <a href="{{ route('movies.edit', $movie->id) }}"
                                               class="btn btn-primary btn-sm custom-edit-btn">Edit</a>
                                        </div>
                                        <div class="col-sm">
                                            <form action="{{ route('movies.destroy', $movie->id) }}" method="post"
                                                  onsubmit="return confirm('Are you sure you want to delete this movie?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <hr class="divider">
        <div class="row justify-content-center mt-4">
            <div class="rounded-buttons-container">
                <a href="{{ $movies->previousPageUrl() }}"
                   class="btn btn-secondary rounded-button {{ $movies->onFirstPage() ? 'disabled' : '' }}">Previous</a>
                <div class="dropdown rounded-button">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        Per Page: {{ request()->query('per_page') ?? 3 }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ $movies->url(1) }}&per_page=1">1</a></li>
                        <li><a class="dropdown-item" href="{{ $movies->url(1) }}&per_page=2">2</a></li>
                        <li><a class="dropdown-item" href="{{ $movies->url(1) }}&per_page=3">3</a></li>
                        <li><a class="dropdown-item" href="{{ $movies->url(1) }}&per_page=4">4</a></li>
                        <li><a class="dropdown-item" href="{{ $movies->url(1) }}&per_page=5">5</a></li>
                    </ul>
                </div>
                <a href="{{ $movies->nextPageUrl() }}"
                   class="btn btn-secondary rounded-button {{ $movies->hasMorePages() ? '' : 'disabled' }}">Next</a>
            </div>
        </div>
    </div>
@endsection
