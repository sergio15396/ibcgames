<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            background: black;
            color: white;
        }
        .card-img-top {
            height: 400px; 
            object-fit: cover;
        }
        h1 {
            color: white;
            font-family: 'Roboto', sans-serif;
            text-align: center; 
            margin-bottom: 30px; 
        }
        .card {
            transition: transform 0.3s;
            opacity: 0.8;
        }
        .card:hover {
            transform: scale(1.05); 
            opacity: 1;
        }
        .star {
            font-size: 2rem;
            color: gold;
        }
        .fixed-back-button {
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 1000; 
            color: white;
            background-color: black;
        }
        .fixed-login-button {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 1000; 
            color: white;
            background-color: black;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <a href="{{ route('categories.index') }}" class="btn btn-light mb-3 fixed-back-button">Back</a>
        <a href="{{ Auth::check() ? route('logout') : route('login') }}" class="btn btn-light mb-3 fixed-login-button">
            {{ Auth::check() ? 'Logout' : 'Login' }}
        </a>

        @if (Auth::check())
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-light mb-3 fixed-login-button">Logout</button>
            </form>
        @endif

        <h1 class="text-center">{{ $category->name }} Games</h1>

        <div class="row mt-4">
            @foreach($games as $game)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href="{{ route('games.details', ['categorySlug' => $game->category->slug, 'slug' => $game->slug]) }}">
                            <img src="{{ asset('images/games/' . $game->image) }}" class="card-img-top" alt="{{ $game->name }}">
                        </a>
                    </div>
                    <div class="rating text-center mt-2">
                        <div class="average-rating mb-2" style="margin-top: 20px;">
                            <strong>Average rating:</strong>
                        </div>
                        @for($i = 1; $i <= 5; $i++)
                            <span class="star" data-value="{{ $i }}" style="color: {{ $game->average_rating && $i <= $game->average_rating ? 'gold' : 'lightgray' }};">&starf;</span>
                        @endfor
                        @if($game->average_rating == null)
                            <div class="mt-2">
                                <span class="badge bg-secondary">Not rated yet</span>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>