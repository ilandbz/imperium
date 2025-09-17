import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

createInertiaApp({
  resolve: async (name) => {
    // Mapa de todas las páginas bajo resources/js/Pages
    const pages = import.meta.glob('./Pages/**/*.vue')
    const importer = pages[`./Pages/${name}.vue`]

    if (!importer) {
      // Muestra en consola las claves disponibles para detectar el path correcto
      console.error('Página no encontrada:', name)
      console.info('Claves disponibles:', Object.keys(pages))
      throw new Error(`No existe ./Pages/${name}.vue`)
    }

    const module = await importer()
    return module.default
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})
