<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Categories</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            background: black;
            color: white;
        }

        .card-img-top {
            height: 200px; 
            object-fit: cover;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        h1, h5 {
            font-family: 'Roboto', sans-serif;
            text-align: center; 
            margin-bottom: 30px; 
        }

        p {
            text-align: center;
        }

        .card-link {
            text-decoration: none; 
            color: black; 
        }

        .card-link:hover {
            color: black;
        }

        .card {
            transition: transform 0.3s;
            opacity: 0.8;
        }

        .card:hover {
            transform: scale(1.05); 
            opacity: 1.2;
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
        <a href="{{ Auth::check() ? route('logout') : route('login') }}" class="btn btn-light mb-3 fixed-login-button">
            {{ Auth::check() ? 'Logout' : 'Login' }}
        </a>

        @if (Auth::check())
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-light mb-3 fixed-login-button">Logout</button>
            </form>
        @endif
        <h1>Game Categories</h1>

        <div class="row mt-4">
        @foreach($categories as $category)
            <div class="col-md-4 mb-4">
                <a href="{{ route('categories.show', $category->slug) }}" class="card-link">
                    <div class="card">
                        <img src="{{ asset('images/categories/' . $category->slug . '.jpg') }}" class="card-img-top" alt="{{ $category->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <p class="card-text">{{ $category->description }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
