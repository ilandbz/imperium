<script setup>
import { onMounted, onBeforeUnmount } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import useDatosSession from '@/Composables/session'
import { useAutenticacion } from '@/Composables/autenticacion'
import Navbar from '@/Components/Sirea/Navbar.vue'

const route = useRoute()
const router = useRouter()


const { usuario, menus, role } = useDatosSession()
const { logoutUsuario } = useAutenticacion()
// --- utilidades para inyectar assets ---
const ASSET_ATTR = 'data-sirea-asset'

function addCss(href) {
  // evita duplicados
  if (document.querySelector(`link[${ASSET_ATTR}][href="${href}"]`)) return
  const link = document.createElement('link')
  link.rel = 'stylesheet'
  link.type = 'text/css'
  link.href = href
  link.setAttribute(ASSET_ATTR, '1')
  document.head.appendChild(link)
}

function addJs(src) {
  // evita duplicados
  if (document.querySelector(`script[${ASSET_ATTR}][src="${src}"]`)) return Promise.resolve()

  return new Promise((resolve, reject) => {
    const script = document.createElement('script')
    script.src = src
    script.defer = true
    script.setAttribute(ASSET_ATTR, '1')
    script.onload = () => resolve()
    script.onerror = () => reject(new Error(`No se pudo cargar ${src}`))
    document.body.appendChild(script)
  })
}

function removeSireaAssets() {
  document.querySelectorAll(`[${ASSET_ATTR}]`).forEach(el => el.remove())
}

// --- clases del body condicionadas ---
let previousBodyClass = ''

onMounted(async () => {
  // Guarda las clases del body (para restaurar al salir)
  previousBodyClass = document.body.className

  // Cambia el body para SIREA (ejemplo: deja vacío o pon las clases que requiera duralux)
  document.body.className = '' // o: 'theme-duralux ...'
  document.body.setAttribute('data-layout', 'sirea') // opcional

  // ✅ CSS del template (en el orden que tu plantilla exige)
  addCss('/duralux/css/bootstrap.min.css')
  addCss('/duralux/vendors/css/vendors.min.css')
  addCss('/duralux/css/theme.min.css')
  addCss('/duralux/css/custom.css')

  // ✅ JS del template (ojo: algunos requieren orden)
  try {
    await addJs('/duralux/vendors/js/vendors.min.js')
    await addJs('/duralux/js/common-init.min.js')
    await addJs('/duralux/js/theme-customizer-init.min.js')
  } catch (e) {
    console.error(e)
  }

  // Tu validación de sesión
  if (!localStorage.getItem('userSession')) {
    const redirect = route.query.redirect || '/sirea/login'
    router.push(redirect)
  }
})

onBeforeUnmount(() => {
  // Quita assets del dashboard
  removeSireaAssets()

  // Restaura body original (antialiased bg-background text-neutral)
  document.body.className = previousBodyClass
  document.body.removeAttribute('data-layout')
})
</script>

<template>
  <!-- IMPORTANTE: wrapper para que tu template tenga su estructura -->
  <div id="top" class="sirea-root">

<Navbar :menus="menus" />

    <router-view />
  </div>
</template>
