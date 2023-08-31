<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'category_id',
        'description',
        'item_type_id',
        'unit_id',
        'unit_price',
        'quantity',
    ];

    public function itemType() {
        return $this->belongsTo(ItemType::class);
    }

    public function unit() {
        return $this->belongsTo(Unit::class);
    }

    public function purchaseRequests() {
        return $this->hasMany(PurchaseRequest::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsToMany(Supplier::class);
    }

    public function biddingOfferedItems() : HasMany
    {
        return $this->hasMany(BiddingOfferedItem::class);
    }

    public function supplierOfferedItems() {
        return $this->hasMany(SupplierOfferedItem::class);
    }

    public function tripTicket() : HasOne
    {
        return $this->hasOne(TripTicket::class);
    }

    public function bidWinners() : HasMany
    {
        return $this->hasMany(BidWinner::class);
    }

}
