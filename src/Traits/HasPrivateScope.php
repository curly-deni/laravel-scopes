<?php

namespace Aesis\Scopes\Traits;

use Aesis\Scopes\ModelScopes\PrivateScope;

trait HasPrivateScope
{
    public static function bootHasPrivateScope()
    {
        if (! is_subclass_of(static::class, \Illuminate\Database\Eloquent\Model::class)) {
            throw new \Exception('The HasPrivateScope trait can only be applied to Eloquent models.');
        }

        if (method_exists(static::class, 'bootHasOwnershipScope')) {
            throw new \Exception('Cannot use HasPrivate and HasOwnershipScope at the same time.');
        }

        static::addGlobalScope(new PrivateScope);
    }
}
