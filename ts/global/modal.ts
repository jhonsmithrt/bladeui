import kebabCase from 'lodash.kebabcase'

window.$openModal = name => {
  return window.dispatchEvent(new Event(`open-bladeui-modal:${kebabCase(name)}`))
}
