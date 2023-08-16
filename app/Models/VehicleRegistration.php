<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VehicleRegistration extends Model
{
    protected $fillable = [
        'id',
        'type',
        'engine_no',
        'chasis_no',
        'body_color',
        'new_donation',
        'make_type_body',
        'description',
        'amount',
        'weight',
        'lto_start',
        'lto_until',
        'gsis',
        'plate_no',
    ];

    use HasFactory;

    public function tripTicket() : HasMany
    {
        return $this->hasMany(TripTicket::class);
    }
}
