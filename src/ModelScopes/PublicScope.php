<?php

namespace Aesis\Scopes\ModelScopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Gate;

class PublicScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (Gate::allows('viewPrivate', $model)) {
            return;
        }

        $builder->where('public', true);
    }
}
