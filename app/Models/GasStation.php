<?php

namespace App\Models;

use App\Models\TripTicket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GasStation extends Model
{

    protected $fillable = [
        'name'
    ];

    use HasFactory;

    public function tripTickets() : HasMany
    {
        return $this->hasMany(TripTicket::class);
    }

}
