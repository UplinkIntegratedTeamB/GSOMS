<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_detail_id',
        'quotation_no',
        'date'
    ];

    public function requestDetail() {
        return $this->belongsTo(RequestDetail::class);
    }

}
