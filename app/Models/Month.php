<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Month extends Model
{
    protected $fillable = [
        'name'
    ];

    use HasFactory;

    public function tripTicket() : HasMany
    {
        return $this->hasMany(TripTicket::class);
    }

}
