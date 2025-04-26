<?php

namespace Aesis\Scopes\Traits;

use Aesis\Scopes\ModelScopes\OwnershipScore;

trait HasOwnershipScope
{
    public static function bootHasOwnershipScope()
    {

        static::addGlobalScope(new OwnershipScore);
    }
}
