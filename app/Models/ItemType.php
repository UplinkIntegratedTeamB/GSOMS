<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    use HasFactory;

    protected $fillables = [
        'type',
    ];

    public function item() {
        return $this->hasOne(Item::class);
    }
}
