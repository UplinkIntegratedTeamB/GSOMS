<?php

namespace App\Models;

use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function item() {
        return $this->hasMany(Item::class);
    }

    public function itemType() : HasOne
    {
        return $this->hasOne(ItemType::class);
    }
}
