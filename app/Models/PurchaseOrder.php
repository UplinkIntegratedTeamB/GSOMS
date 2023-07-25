<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_detail_id',
        'po_no',
        'payment_term',
        'confirm_date',
        'delivery_date',
        'no_of_days',
        'delivery_term',
    ];

    public function requestDetail() {
        return $this->belongsTo(RequestDetail::class);
    }



}
