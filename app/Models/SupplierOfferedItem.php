<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierOfferedItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_offered_id',
        'item_id',
        'quantity',
        'offer_price',
        'total_amt'
    ];

    public function supplierOffered() {
        return $this->belongsTo(SupplierOffered::class);
    }

    public function item() {
        return $this->belongsTo(Item::class);
    }

}
