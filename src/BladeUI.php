<?php
namespace BladeUi;
use BladeUi\Support\{BladeDirectives, ComponentResolver};
class BladeUI
{
    public function component(string $name): string
    {
        return (new static)->components()->resolve($name);
    }

    public function components(): ComponentResolver
    {
        return new ComponentResolver();
    }

    public function directives(): BladeDirectives
    {
        return new BladeDirectives();
    }

}