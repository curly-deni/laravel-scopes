<?php

namespace Aesis\Scopes\LaravelScopes\Traits;

use Aesis\Scopes\LaravelScopes\Scopes\OwnScope;

trait HasOwnScope
{
    public static function bootHasOwnScope()
    {

        if (function_exists('bootHasHoldScope')) {
            throw new \Exception('Cannot use HasOwnScope and HasHoldScope at the same time.');
        }

        if (! function_exists('bootHasPrivateScope') && ! function_exists('bootHasPublicScope')) {
            throw new \Exception('Cannot use HasOwnScope without HasPrivateScope or HasPublicScope.');
        }

        static::addGlobalScope(new OwnScope);
    }
}
