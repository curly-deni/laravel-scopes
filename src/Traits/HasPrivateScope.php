<?php

namespace Aesis\Scopes\Traits;

use Aesis\Scopes\ModelScopes\PrivateScope;

trait HasPrivateScope
{
    public static function bootHasPrivateScope()
    {

        if (method_exists(static::class, 'bootHasOwnershipScope')) {
            throw new \Exception('Cannot use HasPrivate and HasOwnershipScope at the same time.');
        }

        static::addGlobalScope(new PrivateScope);
    }
}
