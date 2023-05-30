<?php

namespace bladeui\Support;

class ComponentResolver
{
    public function resolve(string $name): string
    {
        $components = config('bladeui.components');

        return $components[$name]['alias'];
    }

    public function resolveClass(string $name): string
    {
        $components = config('bladeui.components');

        return $components[$name]['class'];
    }
}
