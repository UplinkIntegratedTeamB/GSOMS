<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcurementMode extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name'
    ];

    public function requestDetail() {
        return $this->hasMany(RequestDetail::class);
    }
}
