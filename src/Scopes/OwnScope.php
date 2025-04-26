<?php

namespace Aesis\Scopes\LaravelScopes\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Gate;

class OwnScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (Gate::allows('viewOwned', $model)) {
            return;
        }

        $user_id = auth()->id();
        $builder->orWhere('user_id', $user_id);
    }
}
