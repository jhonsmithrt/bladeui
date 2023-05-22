<?php

namespace BladeUI\Http\Requests;

use BladeUI\Facades\BladeUI;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use BladeUI\View\Components\BaseButton;

class ButtonRequest extends FormRequest
{
    public function rules(): array
    {
        $buttonClass = BladeUI::components()->resolveClass('button');

        /** @var BaseButton $button */
        $button = new $buttonClass();

        return [
            'color'     => ['sometimes', Rule::in(array_keys($button->defaultColors()))],
            'size'      => ['sometimes', Rule::in(array_keys($button->sizes()))],
            'iconSize'  => ['sometimes', Rule::in(array_keys($button->iconSizes()))],
            'label'     => 'sometimes|string',
            'rightIcon' => 'sometimes|string',
            'icon'      => 'sometimes|string',
            'rounded'   => 'sometimes|boolean',
            'squared'   => 'sometimes|boolean',
            'bordered'  => 'sometimes|boolean',
            'flat'      => 'sometimes|boolean',
        ];
    }
}
