<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserTypeEnum;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'department_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin() : bool {
        return $this->hasRole(UserTypeEnum::Admin);
    }

    public function isUser() : bool {
        return $this->hasRole(UserTypeEnum::User);
    }

    public function isStaff() : bool {
        return $this->hasRole(UserTypeEnum::Staff);
    }

    public function isHeadStaff() : bool {
        return $this->hasRole(UserTypeEnum::HeadStaff);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function purchase_requests()
    {
        return $this->hasMany(PurchaseRequest::class);
    }

    public function requestDetail()
    {
        return $this->hasMany(RequestDetail::class);
    }

}
