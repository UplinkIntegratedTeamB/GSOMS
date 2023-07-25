<?php

namespace App\Models;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AbstractCanvass extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_detail_id',
        'abstract_canvass_id',
        'supplier_id',
        'winner',
        'description',
        'quantity',
        'offer_price',
        'total_amt'
    ];

    public function requestDetail() : BelongsTo
    {
        return $this->belongsTo(RequestDetail::class);
    }
    public function supplierOffereds() : HasMany
    {
        return $this->hasMany(SupplierOffered::class);
    }

    public function winners() : BelongsTo
    {
        return $this->belongsTo(Supplier::class, 'winner', 'id', 'name');
    }

}
