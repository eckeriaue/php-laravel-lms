import './bootstrap'
import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'

const ENABLE_COOKIE_STORE = 'cookieStore' in globalThis

window.Alpine = Alpine
Alpine.plugin(persist)

if(!ENABLE_COOKIE_STORE) {
  const theme = localStorage.getItem('theme')
  const root = document.documentElement.classList
  if (theme && !root.contains(theme)) {
    root.add(theme)
  }
}

Alpine.store('darkMode', {
  on: Alpine.$persist(false).as('darkMode_on'),
  toggle() {
    const enable = this.on = !this.on
    const root = document.documentElement.classList
    if (enable) {
      if (ENABLE_COOKIE_STORE) cookieStore.set('theme', 'dark')
      localStorage.setItem('theme', 'dark')
      root.add('dark')
    }
    else {
      if (ENABLE_COOKIE_STORE) cookieStore.set('theme', '')
      localStorage.setItem('theme', '')
      root.remove('dark')
    }
    return enable 
  }
})