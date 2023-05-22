<?php

namespace BladeUI\Support;

use BladeUi\Actions\Minify;
use Illuminate\Support\Str;
use Illuminate\View\ComponentAttributeBag;

class BladeDirectives
{
    public function scripts(bool $absolute = true, array $attributes = []): string
    {
        $route = route('bladeui.assets.scripts', $parameters = [], $absolute);
        $this->getManifestVersion('bladeui.js', $route);

        $attributes = new ComponentAttributeBag($attributes);

        return <<<HTML
        <script {$attributes->toHtml()}>{$this->hooksScript()}</script>
        <script src="{$route}" defer {$attributes->toHtml()}></script>
        HTML;
    }

    public function hooksScript(): string
    {
        $scripts = <<<JS
            window.BladeUI = {
                hook(hook, callback) {
                    window.addEventListener(`bladeui:\${hook}`, () => callback())
                },
                dispatchHook(hook) {
                    window.dispatchEvent(new Event(`bladeui:\${hook}`))
                }
            }
        JS;

        return Minify::execute($scripts);
    }

    public function styles(bool $absolute = true): string
    {
        $route = route('bladeui.assets.styles', $parameters = [], $absolute);
        $this->getManifestVersion('bladeui.css', $route);

        return "<link href=\"{$route}\" rel=\"stylesheet\" type=\"text/css\">";
    }

    public function getManifestVersion(string $file, ?string &$route = null): ?string
    {
        $manifestPath = dirname(__DIR__, 2) . '/dist/mix-manifest.json';

        if (!file_exists($manifestPath)) {
            return null;
        }

        $manifest = json_decode(file_get_contents($manifestPath), $assoc = true);
        $version  = last(explode('=', $manifest["/{$file}"]));

        if ($route) {
            $route .= "?id={$version}";
        }

        return $version;
    }

    public function confirmAction(string $expression): string
    {
        return "onclick=\"window.\$bladeui.confirmAction($expression, '{{ \$_instance->id }}')\"";
    }

    public function notify(string $expression): string
    {
        return "onclick=\"window.\$bladeui.notify($expression, '{{ \$_instance->id }}')\"";
    }

    public function boolean(string $value): string
    {
        return "<?= json_encode(filter_var($value, FILTER_VALIDATE_BOOLEAN)); ?>";
    }

    public function entangleable(string $expression): ?string
    {
        $fallback = (string) Str::of($expression)->after(',')->trim();
        $property = (string) Str::of($expression)->before(',')->trim();

        return <<<EOT
        <?php if (!isset(\$_instance->id)): ?> @toJs({$fallback}) <?php else : ?> @entangle({$property}) <?php endif; ?>
        EOT;
    }
}
