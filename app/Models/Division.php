<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Division extends Model
{
    use HasFactory;

    public function department() : BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function sections() : HasMany
    {
        return $this->hasMany(Section::class);
    }

}
