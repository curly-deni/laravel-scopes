<?php

namespace Aesis\Scopes\Traits;

use Aesis\Scopes\ModelScopes\SelfScope;

trait HasSelfScope
{
    public static function bootHasSelfScope()
    {
        if (! is_subclass_of(static::class, \Illuminate\Database\Eloquent\Model::class)) {
            throw new \Exception('The HasSelfScope trait can only be applied to Eloquent models.');
        }

        if (method_exists(static::class, 'bootHasOwnershipScope')) {
            throw new \Exception('Cannot use HasSelfScope and HasOwnershipScope at the same time.');
        }

        if (! method_exists(static::class, 'bootHasPrivateScope') && ! method_exists(static::class, 'bootHasPublicScope')) {
            throw new \Exception('Cannot use HasSelfScope without HasPrivateScope or HasPublicScope.');
        }

        static::addGlobalScope(new SelfScope);
    }
}
