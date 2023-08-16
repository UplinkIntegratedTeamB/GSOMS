<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BidInvitation extends Model
{
    protected $fillable = [
        'good',
        'issuance_of_bid',
        'start',
        'until',
        'opening_of_bids',
        'bid_evaluation',
        'post_qualification',
        'notice_of_award',
        'request_detail_id',
        'day',
        'pre_procurement',
        'pre_bid',
    ];

    use HasFactory;

    public function requestDetail() : BelongsTo
    {
        return $this->belongsTo(RequestDetail::class);
    }

}
