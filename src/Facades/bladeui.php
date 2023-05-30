<?php

namespace bladeui\Facades;

use Illuminate\Support\Facades\Facade;
use bladeui\Support\{BladeDirectives, ComponentResolver};

/**
 * @method static string component(string $name)
 * @method static ComponentResolver components()
 * @method static BladeDirectives directives()
 */
class bladeui extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \BladeUI\BladeUI::class;
    }
}
