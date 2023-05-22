import dropdown from './dropdown'
import modal from './modal'
import dialog from './dialog'
import notifications from './notifications'
import maskable from './inputs/maskable'
import currency from './inputs/currency'
import number from './inputs/number'
import password from './inputs/password'
import select from './select'
import timePicker from './time-picker'
import datetimePicker from './datetime-picker'
import colorPicker from './color-picker'

document.addEventListener('alpine:init', () => {
  window.Alpine.data('bladeui_dropdown', dropdown)
  window.Alpine.data('bladeui_modal', modal)
  window.Alpine.data('bladeui_dialog', dialog)
  window.Alpine.data('bladeui_notifications', notifications)
  window.Alpine.data('bladeui_inputs_maskable', maskable)
  window.Alpine.data('bladeui_inputs_currency', currency)
  window.Alpine.data('bladeui_inputs_number', number)
  window.Alpine.data('bladeui_inputs_password', password)
  window.Alpine.data('bladeui_select', select)
  window.Alpine.data('bladeui_timepicker', timePicker)
  window.Alpine.data('bladeui_datetime_picker', datetimePicker)
  window.Alpine.data('bladeui_color_picker', colorPicker)
})
