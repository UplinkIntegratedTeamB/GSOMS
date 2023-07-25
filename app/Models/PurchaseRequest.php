<?php

namespace App\Models;

use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'item_id',
        'quantity',
        'estimated_cost',
        'unit_price',
        'request_detail_id'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function requestDetail()
    {
        return $this->belongsTo(RequestDetail::class);
    }

    // public function

}
