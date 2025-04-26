<?php

namespace Aesis\Scopes\LaravelScopes\Traits;

use Aesis\Scopes\LaravelScopes\Scopes\PublicScope;

trait HasPublicScope
{
    public static function bootHasPublicScope()
    {

        if (function_exists('bootHasHoldScope')) {
            throw new \Exception('Cannot use HasPublicScope and HasHoldScope at the same time.');
        }

        if (function_exists('bootHasPrivateScope')) {
            throw new \Exception('Cannot use HasPublicScope and HasPrivateScope at the same time.');
        }

        static::addGlobalScope(new PublicScope);
    }
}
