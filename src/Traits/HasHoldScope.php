<?php

namespace Aesis\Scopes\Traits;

use Aesis\Scopes\ModelScopes\HoldScope;

trait HasHoldScope
{
    public static function bootHasHoldScope()
    {

        static::addGlobalScope(new HoldScope);
    }
}
