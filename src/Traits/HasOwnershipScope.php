<?php

namespace Aesis\Scopes\Traits;

use Aesis\Scopes\ModelScopes\OwnershipScore;

trait HasOwnershipScope
{
    public static function bootHasOwnershipScope()
    {
        if (! is_subclass_of(static::class, \Illuminate\Database\Eloquent\Model::class)) {
            throw new \Exception('The HasOwnershipScope trait can only be applied to Eloquent models.');
        }

        static::addGlobalScope(new OwnershipScore);
    }
}
