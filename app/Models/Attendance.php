<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    protected $fillable = [
        'bidding_abstract_id',
        'bac_chairman',
        'bac_vc',
        'secretariat',
        'member_1',
        'member_2',
        'member_3',
        'member_4',
        'member_5',
    ];

    use HasFactory;

    public function biddingAbstract() : BelongsTo
    {
        return $this->belongsTo(BiddingAbstract::class);
    }

}
