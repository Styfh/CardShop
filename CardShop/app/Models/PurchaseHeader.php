<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseHeader extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id'
    ];

    public function buyer(){
        return $this->belongsTo(User::class, 'buyer_id', 'id');
    }

}
