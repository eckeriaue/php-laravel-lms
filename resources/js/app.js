import './bootstrap'
import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'


if (localStorage.getItem('darkMode_on') === 'true') document.body.classList.add('dark')

window.Alpine = Alpine
Alpine.plugin(persist)

Alpine.store('darkMode', {
  on: Alpine.$persist(false).as('darkMode_on'),
  toggle() {
    const enable = this.on = !this.on
    const root = document.body.classList
    if (enable) root.add('dark')
    else root.remove('dark')
    return enable 
  }
})