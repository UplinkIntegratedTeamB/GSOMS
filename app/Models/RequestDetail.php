<?php

namespace App\Models;

use App\Models\Scopes\RoleScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RequestDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'department_id',
        'division_id',
        'section_id',
        'requested_by',
        'evaluated_by',
        'particulars',
        'procurement_mode_id',
        'cost_structure',
        'program_activity',
        'pr_no',
        'date1',
        'reference_no',
        'ppmp_no',
        'date2',
        'delivery_period',
        'modified',
        'purpose',
        'region',
        'contingency_rate',
        'date3',
        'sof',
        'euo',
        'project_activity',
        'grand_total',
        'approved_by',
        'user_id',
        'status'
    ];

    public function users() : HasMany
    {
        return $this->hasMany(User::class);
    }

    public function bacRes() : HasOne
    {
        return $this->hasOne(BacRes::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function procurementMode()
    {
        return $this->belongsTo(ProcurementMode::class);
    }

    public function purchaseOrder() : HasOne
    {
        return $this->hasOne(PurchaseOrder::class);
    }

    public function biddingPurchaseOrder() : HasOne
    {
        return $this->hasOne(BiddingPurchaseOrder::class);
    }

    public function purchaseRequest() : HasMany
    {
        return $this->hasMany(PurchaseRequest::class);
    }

    public function department()  : BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function division() : BelongsTo
    {
        return $this->belongsTo(Division::class);
    }

    public function section() : BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function quotation() : HasOne
    {
        return $this->hasOne(Quotation::class);
    }

    public function approvedByUser() : BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by', 'id', 'name');
    }

    public function abstractCanvass() : HasOne
    {
        return $this->hasOne(AbstractCanvass::class);
    }

    public function biddingAbstract() : HasOne
    {
        return $this->hasOne(BiddingAbstract::class);
    }

    public function inventoryCustodian() : HasOne
    {
        return $this->hasOne(InventoryCustodian::class);
    }

    public function acceptanceInspection() : HasOne
    {
        return $this->hasOne(AcceptanceInspection::class);
    }

    public function requestIssue() : HasOne
    {
        return $this->hasOne(RequestIssue::class);
    }

    public function propertyAcknowledgements() : HasOne
    {
        return $this->hasOne(PropertyAcknowledgement::class);
    }

    public function biddingResolution() : HasOne
    {
        return $this->hasOne(BiddingResolution::class);
    }

    public function endUserOffice() : BelongsTo
    {
        return $this->belongsTo(Department::class, 'euo', 'id', 'name');
    }

    protected static function booted() : void
    {
        static::addGlobalScope(new RoleScope);
    }

}
