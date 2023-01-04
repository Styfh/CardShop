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
                "description" => "Based on the famous pokemon game series"
            ],
            [
                "name" => "Digimon",
                "description" => "Digital monsters based on the digimon anime"
            ],
            [
                "name" => "Magic: The Gathering",
                "description" => "The original card game containing many creatures, spells, and more"
            ],
            [
                "name" => "Yu Gi Oh",
                "description" => "From the popular anime featuring Yami Yugi"
            ],
            [
                "name" => "Final Fantasy",
                "description" => "The award winning game series from SquareEnix"
            ],
            [
                "name" => "Dragon Ball",
                "description" => "From the popular shonen anime by Akira Toriyama"
            ],
            [
                "name" => "Cardfight Vanguard",
                "description" => "The official TCG from the popular anime"
            ]
        ]);
    }
}
