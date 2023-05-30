<?php
namespace bladeui\View\Components;



class Button extends BaseButton
{
    public function outlineColors(): array
    {

        return [
            self::DEFAULT => <<<EOT
                border text-slate-500 hover:bg-slate-100 ring-slate-200 dark:ring-slate-600 dark:border-slate-500
                dark:ring-offset-slate-800 dark:text-slate-400 dark:hover:bg-slate-700
            EOT,

            $this->color => <<<EOT
                ring-$this->color-500 text-$this->color-500 border border-$this->color-500 hover:bg-$this->color-50
                dark:ring-offset-slate-800 dark:hover:bg-slate-700
            EOT,
        ];
    }

    public function flatColors(): array
    {
        return [
            self::DEFAULT => <<<EOT
                text-slate-500 hover:bg-slate-100 ring-slate-200 dark:text-slate-400
                dark:hover:bg-slate-700 dark:ring-slate-600 dark:ring-offset-slate-700
            EOT,

            $this->color => <<<EOT
                ring-$this->color-600 text-$this->color-600 hover:bg-$this->color-100
                dark:ring-offset-slate-800 dark:hover:bg-slate-700 dark:ring-$this->color-700
            EOT
        ];
    }

    public function defaultColors(): array
    {
        return [
            self::DEFAULT => <<<EOT
                border text-slate-500 hover:bg-slate-100 ring-slate-200
                dark:ring-slate-600 dark:border-slate-500 dark:hover:bg-slate-700
                dark:ring-offset-slate-800 dark:text-slate-400
            EOT,

            $this->color => <<<EOT
                ring-$this->color-500 text-white bg-$this->color-500 hover:bg-$this->color-600 hover:ring-$this->color-600
                dark:ring-offset-slate-800 dark:bg-$this->color-700 dark:ring-$this->color-700
                dark:hover:bg-$this->color-600 dark:hover:ring-$this->color-600
            EOT,
        ];
    }

    public function sizes(): array
    {
        return [
            '2xs'         => 'gap-x-0.5 text-2xs px-2 py-0.5',
            'xs'          => 'gap-x-1 text-xs px-2.5 py-1.5',
            'sm'          => 'gap-x-2 text-sm leading-4 px-3 py-2',
            self::DEFAULT => 'gap-x-2 text-sm px-4 py-2',
            'md'          => 'gap-x-2 text-base px-4 py-2',
            'lg'          => 'gap-x-2 text-base px-6 py-3',
            'xl'          => 'gap-x-3 text-base px-7 py-4',
        ];
    }

    public function iconSizes(): array
    {
        return [
            '2xs'         => 'w-2 h-2',
            'xs'          => 'w-3 h-3',
            'sm'          => 'w-3.5 h-3.5',
            self::DEFAULT => 'w-4 h-4',
            'md'          => 'w-4 h-4',
            'lg'          => 'w-5 h-5',
            'xl'          => 'w-6 h-6',
        ];
    }
}
