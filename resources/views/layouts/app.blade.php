<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Climbing Leaderboard</title>

    <link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Navbar or any other common components -->
        @auth
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{{ url('/') }}"><i title="Home" class="mdi mdi-home mdi-48px"></i></a>
                <ul class="navbar-nav ml-auto">
                    @if(auth()->user()->admin)
                    <li>
                        <a href="{{ route('blocks.index') }}" class="nav-link"><i title="Edit blocks" class="mdi mdi-pencil mdi-48px"></i></a>
                    </li>
                    @endif

                    <li class="nav-item">
                        <a href="{{ route('account') }}" class="nav-link">
                            @if (auth()->user()->profile_picture)
                                <img title="Account" 
                                src="{{ asset('storage/' . auth()->user()->profile_picture) }}" 
                                alt="PP" 
                                class="img-thumbnail rounded-circle" 
                                style="width: 64px; height: 64px; object-fit: cover;">
                            @else
                                <i title="Account" class="mdi mdi-account mdi-48px"></i>
                            @endif
                        </a>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST"> 
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-link nav-link"><i title="Log out" class="mdi mdi-logout mdi-48px"></i></button>
                        </form>
                    </li>
                </ul>
            </nav>
        @else
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{{ url('/') }}"><i title="Home" class="mdi mdi-home mdi-48px"></i></a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i title="Log in" class="mdi mdi-login mdi-48px"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><i title="Register" class="mdi mdi-account-plus mdi-48px"></i></a>
                    </li>
                </ul>
            </nav>
        @endauth

        <!-- Main content section -->
        @yield('content')
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
