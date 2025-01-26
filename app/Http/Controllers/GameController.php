<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Rating;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function rate(Request $request, $slug)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
        ]);

        $game = Game::where('slug', $slug)->firstOrFail();

        // Verificar si el usuario ya ha calificado el juego
        $rating = Rating::where('game_id', $game->id)
                        ->where('user_id', auth()->id())
                        ->first();

        if ($rating) {
            // Actualizar la calificación existente
            $rating->update(['rating' => $request->rating]);
        } else {
            // Crear una nueva calificación
            Rating::create([
                'game_id' => $game->id,
                'user_id' => auth()->id(),
                'rating' => $request->rating,
            ]);
        }

        return redirect()->back()->with('success', 'Rating submitted successfully!');
    }

    public function showDetails($categorySlug, $slug)
    {
        $game = Game::where('slug', $slug)->firstOrFail();
        $averageRating = $game->ratings()->avg('rating');
        $game->average_rating = $averageRating ? number_format($averageRating, 1) : null;

        // Obtener la calificación del usuario
        $userRating = $game->ratings()->where('user_id', auth()->id())->first();
        $game->user_rating = $userRating ? $userRating->rating : 3; // Valor predeterminado de 3 estrellas

        // Obtener la categoría del juego
        $category = $game->category;

        return view('gameDetails', compact('game', 'category'));
    }
}
