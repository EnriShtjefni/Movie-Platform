<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    {{--    Jquery--}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{--    Select2--}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <title>Movies Platform</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('movies.index') }}">Platform</a>
        <div class="navbar-collapse justify-content-end">
            <div class="profile-picture rounded-circle">
                <img src="{{ asset('images/img_avatar.png') }}" alt="Avatar Image"/>
            </div>
        </div>
    </div>
</nav>

<div class="container-full">
    <div class="container-left">
        <div class="container-dashboard">
            <a class="dashboard-button" href="{{ route('movies.index', ['tab' => 'dashboard']) }}" data-tab="dashboard">🏠︎
                Dashboard</a>
        </div>
        <div class="container-movies">
            <a class="movies-button" href="{{ route('movies.index', ['tab' => 'movies']) }}" data-tab="movies">◽
                Movies</a>
        </div>
        <div class="container-actions">
            <a class="actions-button" id="dropdownButton">Actions</a>

            <ul class="dropdown-menu-actions">
                <li class="add-create-button"><a class="btn-add" href={{ route('movies.create') }}>Add</a></li>
                <li class="add-create-button"><a class="btn-create" href={{ route('movies.create') }}>Create</a></li>
            </ul>
        </div>
    </div>

    <div class="container-right">
        <h2 class="title-right-container"></h2>
        @yield('cards-field')
        @yield('create-card')
        @yield('edit-card')
    </div>
</div>

<!-- Bootstrap bundle (Bootstrap JavaScript and Popper.js to handle dropdown) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="{{ asset('js/actions.js') }}"></script>
<script src="{{ asset('js/titleContainer.js') }}"></script>
<script src="{{ asset('js/toggleActionButtonIcon.js') }}"></script>

</body>

</html>
