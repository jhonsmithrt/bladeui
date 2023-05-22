import colorPicker from './colorPicker'
import modal from './modal'

document.addEventListener('alpine:init', () => {
  window.Alpine.store('bladeui:color-picker', colorPicker)
  window.Alpine.store('bladeui:modal', modal)
})
