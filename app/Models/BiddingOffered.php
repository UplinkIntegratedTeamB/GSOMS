<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BiddingOffered extends Model
{
    protected $fillable = [
        'bidding_abstract_id',
        'supplier_id',
        'grand_total'
    ];

    use HasFactory;

    public function biddingOfferedItems() : HasMany
    {
        return $this->hasMany(BiddingOfferedItem::class);
    }

    public function supplier() : BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function biddingAbstract() : BelongsTo
    {
        return $this->belongsTo(BiddingAbstract::class);
    }

}
