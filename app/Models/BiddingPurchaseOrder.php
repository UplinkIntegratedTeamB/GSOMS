<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BiddingPurchaseOrder extends Model
{
    protected $fillable = [
        'request_detail_id',
        'po_no',
        'payment_term',
        'delivery_term',
        'obr'
    ];

    use HasFactory;

    public function requestDetail() : BelongsTo
    {
        return $this->belongsTo(RequestDetail::class);
    }

}
