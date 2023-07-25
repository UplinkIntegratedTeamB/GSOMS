<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class RoleScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $query, Model $model): void
    {
        $role = auth()->user()->roles->first();

        if($role->name === 'user') {
            $query->where('user_id', auth()->id());
        } elseif ($role->name === 'headstaff') {
            $query->where('status', 1);
        }
    }
}
