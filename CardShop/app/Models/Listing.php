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

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function series(){
        return $this->belongsTo(Series::class);
    }

    public function purchaseDetail(){
        return $this->hasMany(PurchaseDetail::class);
    }
}
