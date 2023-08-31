<?php

namespace App\Models;

use App\Models\SupplierOfferedItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupplierOffered extends Model
{
    use HasFactory;

    protected $fillable = [
        'abstract_canvass_id',
        'supplier_id',
        'grand_total'
    ];


    public function supplierOfferedItems()
    {
        return $this->hasMany(SupplierOfferedItem::class);
    }


    public function abstractCanvasses()
    {
        return $this->belongsTo(AbstractCanvass::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

}
