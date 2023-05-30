<?php

namespace bladeui\Support;

use Illuminate\View\Compilers\ComponentTagCompiler;
use bladeui\Facades\bladeuiDirectives;

class bladeuiTagCompiler extends ComponentTagCompiler
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
                $element = bladeuiDirectives::scripts();
            }

            if ($matches[1] === 'styles') {
                $element = bladeuiDirectives::styles();
            }

            return $element;
        }, $value);
    }
}
