<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'lister_id',
        'name',
        'individual_price',
        'stock',
        'description',
        'image',
        'category_id',
        'series_id'
    ];

    public function lister(){
        return $this->belongsTo(User::class);
    }

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
