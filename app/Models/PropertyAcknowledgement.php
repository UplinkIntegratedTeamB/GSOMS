<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyAcknowledgement extends Model
{
    protected $fillable = [
        'request_detail_id',
        'serial_number',
        'date'
    ];

    use HasFactory;

    public function requestDetail() {
        return $this->belongsTo(RequestDetail::class);
    }

}
