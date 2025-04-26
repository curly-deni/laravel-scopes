<?php

namespace Aesis\Scopes\LaravelScopes\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Gate;

class PrivateScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (Gate::allows('viewPrivate', $model)) {
            return;
        }

        $builder->where('private', false);
    }
}
