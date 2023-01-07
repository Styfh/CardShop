<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'image'
    ];

    public function listing(){
        return $this->hasMany(Listing::class);
    }

}
