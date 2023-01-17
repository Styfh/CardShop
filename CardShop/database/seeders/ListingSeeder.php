<?php

namespace Database\Seeders;

use App\Models\Listing;
use Illuminate\Database\Seeder;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Listing::insert([
            [
                'id' => 1,
                'lister_id' => 1,
                'name' => 'Base Set Charizard',
                'individual_price' => 7000000,
                'stock' => 1,
                'description' => 'Base Set Charizard Holo Rare',
                'image' => 'listing_pics/1/BaseSetCharizard.jpg',
                'category_id' => 1,
                'series_id' => 1
            ],
            [
                'id' => 2,
                'lister_id' => 1,
                'name' => 'Base Set Bulbasaur',
                'individual_price' => 20000,
                'stock' => 48,
                'description' => 'Base Set Bulbasaur Common',
                'image' => 'listing_pics/1/BaseSetBulbasaur.jpg',
                'category_id' => 1,
                'series_id' => 1
            ],
            [
                'id' => 3,
                'lister_id' => 1,
                'name' => 'Base Set Pikachu',
                'individual_price' => 32000,
                'stock' => 12,
                'description' => 'Base Set Pikachu Common',
                'image' => 'listing_pics/1/BaseSetPikachu.jpg',
                'category_id' => 1,
                'series_id' => 1
            ],
            [
                'id' => 4,
                'lister_id' => 1,
                'name' => 'Silver Tempest Lugia V',
                'individual_price' => 100000,
                'stock' => 4,
                'description' => 'Silver Tempest Lugia V Ultra Rare',
                'image' => 'listing_pics/1/SilverTempestLugiaV.jpg',
                'category_id' => 1,
                'series_id' => 1
            ],
            [
                'id' => 5,
                'lister_id' => 1,
                'name' => 'Sword And Shield Promo Eevee VMax',
                'individual_price' => 30000,
                'stock' => 6,
                'description' => 'Sword And Shield Promo Eevee VMax Promo',
                'image' => 'listing_pics/1/SwordAndShieldPromoEeveeVMax.jpg',
                'category_id' => 1,
                'series_id' => 1
            ],
            [
                'id' => 6,
                'lister_id' => 1,
                'name' => 'Astral Radiance Radiant Greninja',
                'individual_price' => 48500,
                'stock' => 1,
                'description' => 'Astral Radiance Radiant Greninja Radiant Rare',
                'image' => 'listing_pics/1/AstralRadianceRadiantGreninja.jpg',
                'category_id' => 1,
                'series_id' => 1
            ],
        ]);
    }
}
