<?php

namespace bladeui\Facades;

use Illuminate\Support\Facades\Facade;
use bladeui\Support\BladeDirectives;

/**
 * @method static string scripts(bool $absolute = true, array $attributes = [])
 * @method static string styles(bool $absolute = true)
 * @method static string|null getManifestVersion(string $file, ?string &$route = null)
 * @method static string confirmAction(string $expression)
 * @method static string notify(string $expression)
 * @method static string boolean(string $value)
 * @method static string entangleable(string $property, mixed $value = null)
 */
class bladeuiDirectives extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return BladeDirectives::class;
    }
}
