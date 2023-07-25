<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BacRes extends Model
{

    protected $fillable = [
        'c_number',
        'res_title',
        'item_details',
        'meeting',
        'amount_in_words',
        'apprv_date',
        'request_detail_id',
    ];

    use HasFactory;

    public function requestDetail() {
        return $this->belongsTo(RequestDetail::class);
    }

}
