<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BiddingResolution extends Model
{

    protected $fillable = [
        'c_number',
        'amount_in_word',
        'start',
        'apprv_date',
        'date_time',
        'until',
        'request_detail_id',
        'bid_evaluation',
        'post_qualification',
        'notice_of_awards',
        'obr',
        'delivery_term'
    ];

    use HasFactory;

    public function requestDetail() : BelongsTo
    {
        return $this->belongsTo(RequestDetail::class);
    }

}
