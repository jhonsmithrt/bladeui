<?php

namespace BladeUi\Facades;

use Illuminate\Support\Facades\Facade;
use BladeUI\Support\{BladeDirectives, ComponentResolver};

/**
 * @method static string component(string $name)
 * @method static ComponentResolver components()
 * @method static BladeDirectives directives()
 */
class BladeUI extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \BladeUI\BladeUI::class;
    }
}
