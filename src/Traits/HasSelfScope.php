<?php

namespace Aesis\Scopes\Traits;

use Aesis\Scopes\ModelScopes\SelfScope;

trait HasSelfScope
{
    public static function bootHasSelfScope()
    {

        if (method_exists(static::class, 'bootHasOwnershipScope')) {
            throw new \Exception('Cannot use HasSelfScope and HasOwnershipScope at the same time.');
        }

        if (! method_exists(static::class, 'bootHasPrivateScope') && ! method_exists(static::class, 'bootHasPublicScope')) {
            throw new \Exception('Cannot use HasSelfScope without HasPrivateScope or HasPublicScope.');
        }

        static::addGlobalScope(new SelfScope);
    }
}
