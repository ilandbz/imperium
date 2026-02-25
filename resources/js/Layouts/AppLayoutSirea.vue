<script setup>
import { onMounted, onBeforeUnmount, ref, computed, watch } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import useDatosSession from '@/Composables/session'
import { useAutenticacion } from '@/Composables/autenticacion'
import Navbar from '@/Components/Sirea/Navbar.vue'
import Topbar from '@/Components/Sirea/Topbar.vue'
import Footer from '@/Components/Sirea/Footer.vue'

const route = useRoute()
const router = useRouter()


const { usuario, menus, role } = useDatosSession()
const { logoutUsuario } = useAutenticacion()
// --- utilidades para inyectar assets ---
const ASSET_ATTR = 'data-sirea-asset'

const isDark = ref(false)
const sidebarCollapsed = ref(false)
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

const pageTitle = computed(() => route.meta?.title || String(route.name || ''))
const isDesktop = () => window.matchMedia('(min-width: 1200px)').matches

const toggleSidebarDesktop = () => {
  if (!isDesktop()) return
  sidebarCollapsed.value = !sidebarCollapsed.value
  localStorage.setItem('sidebarCollapsed', sidebarCollapsed.value ? '1' : '0')
}

const logout = async () => {
  await logoutUsuario(usuario.value.id)
}
const breadcrumbs = computed(() => {
  const items = [
    { text: 'Home', to: '/' }
  ]

  // si estás en Home, no repitas
  if (route.path !== '/') {
    items.push({
      text: pageTitle.value || 'Página',
      to: route.fullPath
    })
  }

  return items
})
watch(isDark, (value) => {
  const theme = value ? 'dark' : 'light'
  localStorage.setItem('theme', theme)
  document.documentElement.setAttribute('data-bs-theme', theme)
})
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
    const redirect = route.query.redirect || '/login'
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
  <div id="top" class="sirea-root">


  <Navbar :menus="menus" />

  <Topbar :is-dark="isDark"
  :user="usuario"
  :role="role"
  :menus="menus"
  @toggle-sidebar="toggleSidebarDesktop"
  @logout="logout" />

  <main class="nxl-container">

    <div class="nxl-content">
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{ pageTitle }}</h5>
                </div>
                <ul class="breadcrumb">
                  <li
                    v-for="(bc, idx) in breadcrumbs"
                    :key="idx"
                    class="breadcrumb-item"
                    :class="{ active: idx === breadcrumbs.length - 1 }"
                    aria-current="page"
                  >
                    <!-- si es el último, texto normal -->
                    <span v-if="idx === breadcrumbs.length - 1">
                      {{ bc.text }}
                    </span>

                    <!-- si no es el último, clickeable -->
                    <RouterLink v-else :to="bc.to">
                      {{ bc.text }}
                    </RouterLink>
                  </li>
                </ul>
            </div>
            <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <div class="d-flex d-md-none">
                        <a href="javascript:void(0)" class="page-header-right-close-toggle">
                            <i class="feather-arrow-left me-2"></i>
                            <span>Back</span>
                        </a>
                    </div>

                </div>
                <div class="d-md-none d-flex align-items-center">
                    <a href="javascript:void(0)" class="page-header-right-open-toggle">
                        <i class="feather-align-right fs-20"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="main-content">
          <slot />
        </div>
    </div>
    <Footer />
  </main>



  </div>



  <!-- <div id="top" class="sirea-root">

    <Navbar :menus="menus" />

    <router-view />
  </div> -->
</template>
