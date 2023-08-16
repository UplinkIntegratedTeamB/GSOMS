<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BiddingAbstract extends Model
{

    protected $fillable = [
        'winner',
        'request_detail_id',
        'purpose',
        'cash_bond',
        'good',
        'winner_total',
        'bank'
    ];

    use HasFactory;

    public function biddingOffereds() : HasMany
    {
        return $this->hasMany(BiddingOffered::class);
    }

    public function requestDetail() : BelongsTo
    {
        return $this->belongsTo(RequestDetail::class);
    }

    public function winners() : BelongsTo
    {
        return $this->belongsTo(Supplier::class, 'winner', 'id', 'name');
    }

    public function attendance() : HasOne
    {
        return $this->hasOne(Attendance::class);
    }

}
