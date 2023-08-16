<?php

namespace App\Models;

use App\Models\AbstractCanvass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'control_no',
        'org_type',
        'expiration_date',
        'code',
        'class_type_id',
        'address',
        'doc_submitted',
        'other_info',
    ];

    public function item()
    {
        return $this->belongsToMany(Item::class);
    }

    public function classType()
    {
        return $this->belongsTo(ClassType::class);
    }

    public function biddingOffered() : HasMany
    {
        return $this->hasMany(BiddingOffered::class);
    }

    public function supplierOffereds() {
        return $this->hasMany(SupplierOffered::class);
    }

    public function tripTicket() : HasMany
    {
        return $this->hasMany(TripTicket::class);
    }

}
