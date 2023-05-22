import { notify, confirmNotification, Notify, Confirm } from '@/notifications'
import { showDialog, showConfirmDialog, ShowConfirmDialog, ShowDialog } from '@/dialog'
import { dataGet, DataGet } from '@/utils/dataGet'
import { Alpine } from '@/components/alpine'
import { BladeUIHooks } from './hooks'
import '@/directives/confirm'
import '@/browserSupport'
import '@/alpine/store'
import '@/alpine/magic'
import '@/alpine/directives'
import '@/components'
import './global'

export interface BladeUI {
  notify: Notify
  confirmNotification: Confirm
  confirmAction: ShowConfirmDialog
  dialog: ShowDialog
  confirmDialog: ShowConfirmDialog
  dataGet: DataGet
}

declare global {
  interface Window {
    $bladeui: BladeUI
    BladeUI: BladeUIHooks
    Livewire: any
    Alpine: Alpine
    $openModal: CallableFunction
  }
}

const BladeUI = {
  notify,
  confirmNotification,
  confirmAction: showConfirmDialog,
  dialog: showDialog,
  confirmDialog: showConfirmDialog,
  dataGet
}

window.$bladeui = BladeUI
document.addEventListener('DOMContentLoaded', () => window.BladeUI.dispatchHook('load'))

export default BladeUI
