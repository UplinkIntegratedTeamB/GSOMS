<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcceptanceInspection extends Model
{
    protected $fillable = [
        'request_detail_id',
        'obr_no',
        'c_number',
        'invoice_no'
    ];

    use HasFactory;

    public function requestDetail() {
        return $this->belongsTo(RequestDetail::class);
    }


}
