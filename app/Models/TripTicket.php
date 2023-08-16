<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TripTicket extends Model
{

    protected $fillable = [
        'month_id',
        'department_id',
        'division_id',
        'item_id',
        'supplier_id',
        'driver',
        'passenger',
        'gas_type',
        'place_to_visit',
        'purpose',
        'amount',
        'oil_issued',
        'date',
        'start_time',
        'end_time'
    ];

    use HasFactory;

    public function department() : BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function vehicleRegistration() : BelongsTo
    {
        return $this->belongsTo(VehicleRegistration::class);
    }

    public function month() : BelongsTo
    {
        return $this->belongsTo(Month::class);
    }

    public function supplier() : BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

}
