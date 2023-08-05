<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{

    protected $fillable = [
        'unit_code',
        'description'
    ];

    use HasFactory;


    public function item() {
        return $this->hasmany(Item::class);
    }

}
