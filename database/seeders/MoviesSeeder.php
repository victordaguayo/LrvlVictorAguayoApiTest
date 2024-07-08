<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('movies')->insert([
            'name'=>"Intensamente 2",
            'synopsis'=>"Riley, ahora adolescente, enfrenta una reforma en la Central de sus emociones. Alegría, Tristeza, Ira, Miedo y Asco deben adaptarse a la llegada de nuevas emociones: Ansiedad, Vergüenza, Envidia y Ennui. ¿Cómo manejarán este inesperado cambio?",
            'imgurl'=>"https://image.tmdb.org/t/p/original//lE3DCRI7bQgHSiIuEPcFiXpiuGV.jpg",
            'review'=> "Intensamente 2 ya la vi en el cine y debo decir que es una maravilla total."
        ]);
        DB::table('movies')->insert([
            'name'=>"Mi Villano favorito 4",
            'synopsis'=>"Gru tendrá que enfrentarse en esta ocasión a su nueva némesis Maxime Le Mal y su sofisticada y malévola novia Valentina, lo que obligará a la familia a tener que darse a la fuga.",
            'imgurl'=>"https://image.tmdb.org/t/p/original//wTpzSDfbUuHPEgqgt5vwVtPHhrb.jpg",
            'review'=> "Me pareció muy buena pero solo por el factor nostalgia. Fuera de eso como me gustaban las otras peliculas cuando era chico me pareció una joya que me hizo sentir un chico devuelta."
        ]);
    }
}
