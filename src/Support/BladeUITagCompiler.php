<?php

namespace BladeUI\Support;

use Illuminate\View\Compilers\ComponentTagCompiler;
use BladeUI\Facades\BladeUIDirectives;

class BladeUITagCompiler extends ComponentTagCompiler
{
    public function compile($value)
    {
        return $this->compileBladeUISelfClosingTags($value);
    }

    protected function compileBladeUISelfClosingTags($value)
    {
        $pattern = '/<\s*bladeui\:(scripts|styles)\s*\/?>/';

        return preg_replace_callback($pattern, function (array $matches) {
            $element = '<script>throw new Error("Wrong <bladeui:scripts /> usage. It should be <bladeui:scripts />")</script>';

            if ($matches[1] === 'scripts') {
                $element = BladeUIDirectives::scripts();
            }

            if ($matches[1] === 'styles') {
                $element = BladeUIDirectives::styles();
            }

            return $element;
        }, $value);
    }
}
