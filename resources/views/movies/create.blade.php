@extends('layouts.layout')

@section('create-card')
    <div class="container-grey-background">
        <div class="container h-100 mt-5">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-10 col-md-8 col-lg-6">
                    <h3>Add a Movie</h3>
                    <hr class="divider">
                    <form action="{{ route('movies.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="year">Year</label>
                            <input type="number" class="form-control" id="year" name="year" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <textarea class="form-control" id="status" name="status" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="company_id">Company</label>
                            <select class="form-control" id="company_id" name="company_id" required>
                                <option value="0" selected disabled>Select a Company</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                            @error('company_id')
                            <div class="text-danger">{{ "Please select a company" }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="categories">Categories</label>
                            <select class="form-control" id="categories" name="categories[]" multiple required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary custom-edit-btn">Create Movie</button>
                        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
