<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Movie</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('movies.index') }}">Platform</a>
        <div class="navbar-collapse justify-content-end">
            {{--            <div class="profile-picture rounded-circle"><p>ES</p></div>--}}
            <div class="profile-picture rounded-circle">
                <img src="{{ asset('images/img_avatar.png') }}" alt="Avatar Image"/>
            </div>
        </div>
    </div>
</nav>

<div class="container-black-background">
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="cards-container">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{ $movie->title }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $movie->description }}</p>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $movie->year }}</p>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $movie->status }}</p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm">
                                <a href="{{ route('movies.edit', $movie->id) }}"
                                   class="btn btn-primary btn-sm">Edit</a>
                            </div>
                            <div class="col-sm">
                                <form action="{{ route('movies.destroy', $movie->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
