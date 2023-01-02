<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'lister_id',
        'name',
        'individual_price',
        'stock',
        'description',
        'image',
        'category_id',
        'series_id'
    ];
}
