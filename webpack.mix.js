const mix = require('laravel-mix')
const path = require('path')

mix.ts('ts/index.ts', 'dist/bladeui.js')
  .setPublicPath('dist')
  .postCss('resources/css/bladeui.css', 'dist', [require('tailwindcss')])
  .alias({
    '@': path.join(__dirname, 'ts')
  })

if (mix.inProduction()) {
  mix.version()
}

mix.disableSuccessNotifications()
