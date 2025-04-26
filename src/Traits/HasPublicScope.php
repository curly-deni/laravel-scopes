<?php

namespace Aesis\Scopes\LaravelScopes\Traits;

use Aesis\Scopes\LaravelScopes\Scopes\PublicScope;

trait HasPublicScope
{
    public static function bootHasPublicScope()
    {

        if (method_exists(static::class, 'bootHasHoldScope')) {
            throw new \Exception('Cannot use HasPublicScope and HasHoldScope at the same time.');
        }

        if (method_exists(static::class, 'bootHasPrivateScope')) {
            throw new \Exception('Cannot use HasPublicScope and HasPrivateScope at the same time.');
        }

        static::addGlobalScope(new PublicScope);
    }
}
