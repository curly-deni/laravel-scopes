<?php

namespace Aesis\Scopes\LaravelScopes\Traits;

use Aesis\Scopes\LaravelScopes\Scopes\PrivateScope;

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
