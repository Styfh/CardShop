<?php

namespace Database\Seeders;

use App\Models\Series;
use Illuminate\Database\Seeder;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Series::insert([
            [
                "name" => "Pokemon",
                "image" => "series_pics/pokemon.png",
            ],
            [
                "name" => "Digimon",
                "image" => "series_pics/digimon.png"
            ],
            [
                "name" => "Magic: The Gathering",
                "image" => "series_pics/mtg.png"
            ],
            [
                "name" => "Yu Gi Oh",
                "image" => "series_pics/yugioh.png"
            ],
            [
                "name" => "Final Fantasy",
                "image" => "series_pics/ff.png"
            ],
            [
                "name" => "Dragon Ball",
                "image" => "series_pics/db.png"
            ],
            [
                "name" => "Cardfight Vanguard",
                "description" => "series_pics/vanguard.png"
            ]
        ]);
    }
}
