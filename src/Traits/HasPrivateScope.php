<?php

namespace Aesis\Scopes\Traits;

use Aesis\Scopes\ModelScopes\PrivateScope;

trait HasPrivateScope
{
    public static function bootHasPrivateScope()
    {

        if (method_exists(static::class, 'bootHasHoldScope')) {
            throw new \Exception('Cannot use HasPrivate and HasHoldScope at the same time.');
        }

        static::addGlobalScope(new PrivateScope);
    }
}
