<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id',
        'quantity'
    ];

    public function listing(){
        return $this->belongsTo(Listing::class);
    }

    public function header(){
        return $this->belongsTo(PurchaseHeader::class, 'header_id', 'id');
    }

}
