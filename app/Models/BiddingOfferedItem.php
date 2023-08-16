<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BiddingOfferedItem extends Model
{

    protected $fillable = [
        'bidding_offered_id',
        'item_id',
        'item_description',
        'quantity',
        'offer_price',
        'total_amt'
    ];

    use HasFactory;


    public function biddingOffered() : BelongsTo
    {
        return $this->belongsTo(BiddingOffered::class);
    }

    public function item() : BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

}
