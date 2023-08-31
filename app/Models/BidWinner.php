<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BidWinner extends Model
{
    use HasFactory;

    protected $fillable = [
        'abstract_canvass_id',
        'supplier_id',
        'item_id',
        'total_amt'
    ];

    public function abstractCanvass() : BelongsTo
    {
        return $this->belongsTo(AbstractCanvass::class);
    }

    public function supplier() : BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function item() : BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

}
