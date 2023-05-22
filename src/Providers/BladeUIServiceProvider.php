<?php

namespace BladeUI\Providers;

use BladeUI\Facades\{BladeUIDirectives};
use BladeUI\Facades\BladeUI;
use Illuminate\Foundation\{AliasLoader, Application};
use Illuminate\Support\{ServiceProvider, Str};
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\ComponentAttributeBag;
use Livewire\LivewireBladeDirectives;
use Livewire\WireDirective;
use BladeUI\Support\BladeUITagCompiler;

/**
 * @property Application $app
 */
class BladeUIServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerConfig();
        $this->registerBladeDirectives();
        $this->registerBladeComponents();
        $this->registerTagCompiler();
        $this->registerMacros();
    }

    public function register()
    {
        $this->app->singleton('BladeUI', BladeUI::class);
        $loader = AliasLoader::getInstance();
        $loader->alias('BladeUI', BladeUI::class);
    }

    protected function registerTagCompiler()
    {
        Blade::precompiler(static function (string $string): string {
            return app(BladeUITagCompiler::class)->compile($string);
        });
    }

    protected function registerConfig(): void
    {
        $rootDir = __DIR__ . '/../..';

        $this->loadViewsFrom("{$rootDir}/resources/views", 'bladeui');
        $this->loadTranslationsFrom("{$rootDir}/src/lang", 'bladeui');
        $this->mergeConfigFrom("{$rootDir}/src/config/bladeui.php", 'bladeui');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->publishes(
            ["{$rootDir}/src/config/bladeui.php" => config_path('bladeui.php')],
            'bladeui.config'
        );

        $this->publishes(
            ["{$rootDir}/resources/views" => resource_path('views/vendor/bladeui')],
            'bladeui.resources'
        );

        $this->publishes(
            ["{$rootDir}/src/lang" => $this->app->langPath('vendor/bladeui')],
            'bladeui.lang'
        );
    }

    protected function registerBladeDirectives(): void
    {
        Blade::directive('confirmAction', static function (string $expression): string {
            return BladeUIDirectives::confirmAction($expression);
        });

        Blade::directive('notify', static function (string $expression): string {
            return BladeUIDirectives::notify($expression);
        });

        Blade::directive('BladeUIScripts', static function (?string $attributes = ''): string {
            if (!$attributes) {
                $attributes = '[]';
            }

            return "{!! BladeUI::directives()->scripts(attributes: {$attributes}) !!}";
        });

        Blade::directive('BladeUIStyles', static function (): string {
            return BladeUIDirectives::styles();
        });

        Blade::directive('boolean', static function ($value): string {
            return BladeUIDirectives::boolean($value);
        });

        Blade::directive('toJs', static function ($expression): string {
            return LivewireBladeDirectives::js($expression);
        });

        Blade::directive('entangleable', static function ($value): string {
            return BladeUIDirectives::entangleable($value);
        });
    }

    protected function registerBladeComponents(): void
    {
        $this->callAfterResolving(BladeCompiler::class, static function (BladeCompiler $blade): void {
            foreach (config('bladeui.components') as $component) {
                $blade->component($component['class'], $component['alias']);
            }
        });
    }

    protected function registerMacros(): void
    {
        ComponentAttributeBag::macro('wireModifiers', function () {
            /** @var ComponentAttributeBag $this */

            /** @var WireDirective $model */
            $model = $this->wire('model');

            return [
                'defer'    => $model->modifiers()->contains('defer'),
                'lazy'     => $model->modifiers()->contains('lazy'),
                'debounce' => [
                    'exists' => $model->modifiers()->contains('debounce'),
                    'delay'  => (string) Str::of($model->modifiers()->get(1, '750'))->replace('ms', ''),
                ],
            ];
        });
    }
}
