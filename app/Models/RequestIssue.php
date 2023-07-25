<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestIssue extends Model
{
    protected $fillable = [
        'id',
        'request_detail_id',
        'date',
        'c_number'
    ];

    use HasFactory;

    public function requestDetail() {
        return $this->belongsTo(RequestDetail::class);
    }

}
