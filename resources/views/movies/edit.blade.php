@extends('layouts.layout')

@section('edit-card')
    <div class="container-grey-background">
        <div class="container h-100 mt-5">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-10 col-md-8 col-lg-6">
                    <h3>Update Movie</h3>
                    <hr class="divider">
                    <form action="/movies/{{$movie->id}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                   value="{{ $movie->title }}"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description"
                                      required>{{ $movie->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="year">Year</label>
                            <input type="number" class="form-control" id="year" name="year"
                                   value="{{ $movie->year }}"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <textarea class="form-control" id="status" name="status"
                                      required>{{ $movie->status }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="company_id">Company</label>
                            <select class="form-control" id="company_id" name="company_id" required>
                                @if($movie->company_id)
                                    <option value="{{ $movie->company_id }}"
                                            selected>{{ $movie->company->name }}</option>
                                @else
                                    <option value="" disabled selected>Select a Company</option>
                                @endif
                                @foreach($companies as $company)
                                    @if($movie->company_id != $company->id)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categories">Categories</label>
                            <select class="form-control" id="categories" name="categories[]" multiple required>
                                @foreach($categories as $category)
                                    <option
                                        value="{{ $category->id }}" {{ $movie->categories->contains($category->id) ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 custom-edit-btn">Update Movie</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
