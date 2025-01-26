<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = [
            [
                'name' => 'The Last of Us',
                'slug' => 'tlu',
                'description' => 'An action-adventure game set in a post-apocalyptic world.',
                'image' => 'the_last_of_us.jpg',
                'url_trailer' => 'https://www.youtube.com/embed/R2Ebc_OFeug',
                'category_id' => 1, // ID de la categoría "Action"
            ],
            [
                'name' => 'God of War',
                'slug' => 'gow',
                'description' => 'An action-adventure game based on Norse mythology.',
                'image' => 'god_of_war.jpg',
                'url_trailer' => 'https://www.youtube.com/embed/hfJ4Km46A-0',
                'category_id' => 1,
            ],
            [
                'name' => 'Dark Souls',
                'slug' => 'ds',
                'description' => 'An action RPG known for its challenging gameplay.',
                'image' => 'dark_souls.jpg',
                'url_trailer' => 'https://www.youtube.com/embed/Woe0PYZPxRw',
                'category_id' => 1,
            ],
            [
                'name' => 'Zelda: Breath of the Wild',
                'slug' => 'botw',
                'description' => 'An open-world action-adventure game set in Hyrule.',
                'image' => 'zelda_botw.jpg',
                'url_trailer' => 'https://www.youtube.com/embed/r6gQn18aemE',
                'category_id' => 2, // ID de la categoría "Adventure"
            ],
            [
                'name' => 'Tomb Raider',
                'slug' => 'tr',
                'description' => 'An action-adventure game featuring Lara Croft.',
                'image' => 'tomb_raider.jpg',
                'url_trailer' => 'https://www.youtube.com/embed/D1kTu2hacaI',
                'category_id' => 2,
            ],
            [
                'name' => 'Uncharted',
                'slug' => 'uc',
                'description' => 'An action-adventure game following treasure hunter Nathan Drake.',
                'image' => 'uncharted.jpg',
                'url_trailer' => 'https://www.youtube.com/embed/-PhhiKPHTWM',
                'category_id' => 2,
            ],
            [
                'name' => 'Final Fantasy VII',
                'slug' => 'ff7',
                'description' => 'A classic RPG with a rich story and memorable characters.',
                'image' => 'ff7.jpg',
                'url_trailer' => 'https://www.youtube.com/embed/sz9QWTcbXYE',
                'category_id' => 3, // ID de la categoría "RPG"
            ],
            [
                'name' => 'The Witcher 3',
                'slug' => 'tw3',
                'description' => 'An open-world RPG set in a fantasy universe.',
                'image' => 'witcher3.jpg',
                'url_trailer' => 'https://www.youtube.com/embed/c0i88t0Kacs',
                'category_id' => 3,
            ],
            [
                'name' => 'Persona 5',
                'slug' => 'p5',
                'description' => 'A Japanese RPG with a unique art style and story.',
                'image' => 'persona5.jpg',
                'url_trailer' => 'https://www.youtube.com/embed/QnDzJ9KzuV4',
                'category_id' => 3,
            ],
            [
                'name' => 'Call of Duty',
                'slug' => 'cod',
                'description' => 'A first-person shooter game with various military campaigns.',
                'image' => 'call_of_duty.jpg',
                'url_trailer' => 'https://www.youtube.com/embed/28ftY5ZCtiE',
                'category_id' => 4, // ID de la categoría "Shooter"
            ],
            [
                'name' => 'Counter-Strike',
                'slug' => 'cs',
                'description' => 'A multiplayer first-person shooter game.',
                'image' => 'counter_strike.jpg',
                'url_trailer' => 'https://www.youtube.com/embed/c80dVYcL69E',
                'category_id' => 4,
            ],
            [
                'name' => 'Overwatch',
                'slug' => 'ow',
                'description' => 'A team-based multiplayer first-person shooter.',
                'image' => 'overwatch.jpg',
                'url_trailer' => 'https://www.youtube.com/embed/LGgqyer-qr4',
                'category_id' => 4,
            ],
            [
                'name' => 'FIFA 24',
                'slug' => 'f24',
                'description' => 'A football simulation video game.',
                'image' => 'fifa24.jpg',
                'url_trailer' => 'https://www.youtube.com/embed/N91EB85mq4E',
                'category_id' => 5, // ID de la categoría "Sports"
            ],
            [
                'name' => 'NBA 2K24',
                'slug' => 'nba2k',
                'description' => 'A basketball simulation video game.',
                'image' => 'nba2k24.jpg',
                'url_trailer' => 'https://www.youtube.com/embed/GITzbGIiNKg',
                'category_id' => 5,
            ],
            [
                'name' => 'Madden NFL 24',
                'slug' => 'm24',
                'description' => 'An American football video game.',
                'image' => 'madden24.jpg',
                'url_trailer' => 'https://www.youtube.com/embed/oCwfUE-dUrI',
                'category_id' => 5,
            ],
            [
                'name' => 'The Sims 4',
                'slug' => 'ts4',
                'description' => 'A life simulation game where you create and control people.',
                'image' => 'sims4.jpg',
                'url_trailer' => 'https://www.youtube.com/embed/DyNv44QR14g',
                'category_id' => 6, // ID de la categoría "Simulation"
            ],
            [
                'name' => 'Cities: Skylines',
                'slug' => 'csk',
                'description' => 'A city-building simulation game.',
                'image' => 'cities_skylines.jpg',
                'url_trailer' => 'https://www.youtube.com/embed/CpWe03NhXKs',
                'category_id' => 6,
            ],
            [
                'name' => 'Planet Coaster',
                'slug' => 'pc',
                'description' => 'A theme park simulation game.',
                'image' => 'planet_coaster.jpg',
                'url_trailer' => 'https://www.youtube.com/embed/91Kli1Uwk9g',
                'category_id' => 6,
            ],
        ];

        foreach ($games as $game) {
            Game::create($game);
        }
    }
}
