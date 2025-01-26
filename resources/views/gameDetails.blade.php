<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $game->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            background: black;
            color: white;
        }
        .game-image {
            height: 300px; 
            width: auto; 
            object-fit: cover; 
        }
        h1 {
            font-family: 'Roboto', sans-serif;
            text-align: center; 
            margin-bottom: 30px; 
        }
        .star {
            font-size: 2rem; 
            color: gold;
            cursor: pointer;
        }
        .star:hover {
            color: orange;
        }
        p {
            text-align: center;
        }
        .rate {
            margin-top: 40px;
            margin-bottom: 0px;
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
        .modal-title {
            color: black;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <a href="{{ route('categories.show', $category->slug) }}" class="btn btn-light mb-3 fixed-back-button">Back</a>
        <a href="{{ Auth::check() ? route('logout') : route('login') }}" class="btn btn-light mb-3 fixed-login-button">
            {{ Auth::check() ? 'Logout' : 'Login' }}
        </a>
        @if (Auth::check())
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-light mb-3 fixed-login-button">Logout</button>
            </form>
        @endif
        @if(session('success'))
            <div class="alert alert-success text-center" style="position: fixed; top: 30px; left: 50%; transform: translateX(-50%); z-index: 1050; max-width: 300px; margin: 0 auto;" id="success-message">
                {{ session('success') }}
            </div>
        @endif
        <h1>{{ $game->name }}</h1>
        <p>{{ $game->description }}</p>
        <p>Click the image to watch the trailer!</p>
        <img src="{{ asset('images/games/' . $game->image) }}" class="game-image mx-auto d-block" alt="{{ $game->name }}" data-bs-toggle="modal" data-bs-target="#videoModal">
        <p class="rate">Rate this game:</p>
        @auth
            <div class="rating text-center mt-2">
                @for($i = 1; $i <= 5; $i++)
                    <span class="star" data-value="{{ $i }}" style="color: {{ $game->user_rating && $i <= $game->user_rating ? 'gold' : 'lightgray' }};">&starf;</span>
                @endfor
                <form action="{{ route('games.rate', $game->slug) }}" method="POST" id="rating-form">
                    @csrf
                    <input type="hidden" name="rating" id="rating-{{ $game->slug }}">
                    <button type="submit" class="btn btn-light mb-3" style="color: black; background-color: gold; font-weight: bold;">Submit Rating</button>
                </form>
            </div>
        @endauth
    </div>

    <!-- Modal -->
    @if ($game->url_trailer)
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">{{ $game->name }} - Trailer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="ratio ratio-16x9">
                        <iframe id="videoFrame" src="{{ $game->url_trailer }}" 
                                title="YouTube video player" frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const videoModal = document.getElementById('videoModal');
        const videoFrame = document.getElementById('videoFrame');

        videoModal.addEventListener('hide.bs.modal', function () {
            videoFrame.src = videoFrame.src; // Reset the video source to stop the video
        });

        document.querySelectorAll('.star').forEach(star => {
            star.addEventListener('click', function() {
                const rating = this.getAttribute('data-value');
                const gameSlug = '{{ $game->slug }}';
                document.getElementById('rating-' + gameSlug).value = rating;

                // Resaltar estrellas seleccionadas
                const stars = this.parentElement.querySelectorAll('.star');
                stars.forEach(s => {
                    s.style.color = s.getAttribute('data-value') <= rating ? 'gold' : 'lightgray';
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.addEventListener('click', function() {
                    successMessage.style.display = 'none'; // Ocultar el mensaje al hacer clic
                });
            }
        });
    </script>
</body>
</html>