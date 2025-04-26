<?php

namespace Aesis\Scopes\LaravelScopes\Traits;

use Aesis\Scopes\LaravelScopes\Scopes\OwnScope;

trait HasOwnScope
{
    public static function bootHasOwnScope()
    {

        if (method_exists(static::class, 'bootHasHoldScope')) {
            throw new \Exception('Cannot use HasOwnScope and HasHoldScope at the same time.');
        }

        if (! method_exists(static::class, 'bootHasPrivateScope') && ! method_exists(static::class, 'bootHasPublicScope')) {
            throw new \Exception('Cannot use HasOwnScope without HasPrivateScope or HasPublicScope.');
        }

        static::addGlobalScope(new OwnScope);
    }
}
