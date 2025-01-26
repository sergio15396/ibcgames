<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $games = Game::where('category_id', $category->id)->get();

        // Calcular el promedio de calificaciones para cada juego
        foreach ($games as $game) {
            $game->average_rating = $game->ratings()->avg('rating'); 
        }

        return view('games', compact('category', 'games'));
    }
}
