import './bootstrap'
import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'

window.Alpine = Alpine
Alpine.plugin(persist)

Alpine.store('darkMode', {
  on: Alpine.$persist(false).as('darkMode_on'),
  toggle() {
    const enable = this.on = !this.on
    const root = document.documentElement.classList
    if (enable) root.add('dark')
    else root.remove('dark')
    return enable 
  }
})

void function() {
  const root = document.documentElement.classList
  const enableDarkMode = localStorage.getItem('darkMode_on') === 'true'
  if (enableDarkMode) root.add('dark')
}()