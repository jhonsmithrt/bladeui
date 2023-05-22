<?php
use BladeUI\View\Components;
return [
    'icons' => [
        'style' => env('BLADEUI_ICONS_STYLE', 'outline'),
    ],
    'components' => [
        'icon' => [
            'class' => Components\Icon::class,
            'alias' => 'icon',
        ],
        'icon.spinner' => [
            'class' => Components\Icons\Spinner::class,
            'alias' => 'icon.spinner',
        ],
        'button' => [
            'class' => Components\Button::class,
            'alias' => 'button',
        ],
    ]
];