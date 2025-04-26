<?php

namespace Aesis\Scopes\Traits;

use Aesis\Scopes\ModelScopes\PublicScope;

trait HasPublicScope
{
    public static function bootHasPublicScope()
    {

        if (method_exists(static::class, 'bootHasOwnershipScope')) {
            throw new \Exception('Cannot use HasPublicScope and HasOwnershipScope at the same time.');
        }

        if (method_exists(static::class, 'bootHasPrivateScope')) {
            throw new \Exception('Cannot use HasPublicScope and HasPrivateScope at the same time.');
        }

        static::addGlobalScope(new PublicScope);
    }
}
