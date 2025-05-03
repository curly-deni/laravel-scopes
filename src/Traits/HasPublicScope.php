<?php

namespace Aesis\Scopes\Traits;

use Aesis\Scopes\ModelScopes\PublicScope;

trait HasPublicScope
{
    public static function bootHasPublicScope()
    {
        if (! is_subclass_of(static::class, \Illuminate\Database\Eloquent\Model::class)) {
            throw new \Exception('The HasPublicScope trait can only be applied to Eloquent models.');
        }

        if (method_exists(static::class, 'bootHasOwnershipScope')) {
            throw new \Exception('Cannot use HasPublicScope and HasOwnershipScope at the same time.');
        }

        if (method_exists(static::class, 'bootHasPrivateScope')) {
            throw new \Exception('Cannot use HasPublicScope and HasPrivateScope at the same time.');
        }

        static::addGlobalScope(new PublicScope);
    }
}
