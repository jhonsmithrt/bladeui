<?php

namespace bladeui\Traits;

trait ColorsDefault
{
    protected $colorButton = [
        'primary' => <<<EOT
                ring-primary-500 text-white bg-primary-500 hover:bg-primary-600 hover:ring-primary-600
                dark:ring-offset-slate-800 dark:bg-primary-700 dark:ring-primary-700
                dark:hover:bg-primary-600 dark:hover:ring-primary-600
            EOT,

        'secondary' => <<<EOT
                ring-secondary-500 text-white bg-secondary-500 hover:bg-secondary-600 hover:ring-secondary-600
                dark:ring-offset-slate-800 dark:bg-secondary-700 dark:ring-secondary-700
                dark:hover:bg-secondary-600 dark:hover:ring-secondary-600
            EOT,

        'positive' => <<<EOT
                ring-positive-500 text-white bg-positive-500 hover:bg-positive-600 hover:ring-positive-600
                dark:ring-offset-slate-800 dark:bg-positive-700 dark:ring-positive-700
                dark:hover:bg-positive-600 dark:hover:ring-positive-600
            EOT,

        'negative' => <<<EOT
                ring-negative-500 text-white bg-negative-500 hover:bg-negative-600 hover:ring-negative-600
                dark:ring-offset-slate-800 dark:bg-negative-700 dark:ring-negative-700
                dark:hover:bg-negative-600 dark:hover:ring-negative-600
            EOT,

        'warning' => <<<EOT
                ring-warning-500 text-white bg-warning-500 hover:bg-warning-600 hover:ring-warning-600
                dark:ring-offset-slate-800 dark:bg-warning-700 dark:ring-warning-700
                dark:hover:bg-warning-600 dark:hover:ring-warning-600
            EOT,

        'info' => <<<EOT
                ring-info-500 text-white bg-info-500 hover:bg-info-600 hover:ring-info-600
                dark:ring-offset-slate-800 dark:bg-info-700 dark:ring-info-700
                dark:hover:bg-info-600 dark:hover:ring-info-600
            EOT,

        'dark' => <<<EOT
                ring-gray-700 text-white bg-gray-700 hover:bg-gray-900 hover:ring-gray-900
                dark:ring-offset-gray-800 dark:bg-gray-700 dark:ring-gray-700
                dark:hover:bg-gray-600 dark:hover:ring-gray-600
            EOT,
    ];
}