<?php

namespace Aesis\Scopes\LaravelScopes\Traits;

use Aesis\Scopes\LaravelScopes\Scopes\HoldScope;

trait HasHoldScope
{
    public static function bootHasHoldScope()
    {

        static::addGlobalScope(new HoldScope);
    }
}
