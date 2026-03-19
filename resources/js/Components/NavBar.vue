<script setup>
import { ref, onMounted, onUnmounted, computed, nextTick } from 'vue'
import { RouterLink, useRoute, useRouter } from 'vue-router'

/* ---------------- UI state ---------------- */
const scrolled = ref(false)
const openInstitucionalMenu = ref(false)
const showBrochure = ref(false)

let hoverTimer = null
const openInstitucional = () => {
  clearTimeout(hoverTimer)
  openInstitucionalMenu.value = true
}
const closeInstitucional = () => {
  hoverTimer = setTimeout(() => (openInstitucionalMenu.value = false), 120)
}

/* ---------------- scroll shadow ---------------- */
const checkScroll = () => { scrolled.value = window.scrollY > 4 }
onMounted(() => {
  checkScroll()
  window.addEventListener('scroll', checkScroll, { passive: true })
})
onUnmounted(() => window.removeEventListener('scroll', checkScroll))

/* ---------------- router ---------------- */
const route = useRoute()
const router = useRouter()

const pathname = computed(() => route.path) // "/institucional/..."
const isHome = computed(() => route.path === '/')

const isActive = (href) => pathname.value === href
const isActiveStartsWith = (prefix) => pathname.value === prefix || pathname.value.startsWith(prefix + '/')

/* ---------------- institucional items ---------------- */
const institucionalItems = [
  { label: '¿Quiénes somos?', href: '/institucional/quienes-somos' },
  { label: 'Unidad de Gobierno', href: '/institucional/organo-direccion' },
  { label: 'Normas Legales', href: '/institucional/normas-legales' },
  { label: 'Ver Brochure', action: () => (showBrochure.value = true) },
  { label: 'Banco de Laudos', href: '/institucional/banco-de-laudos' },
  { label: 'Banco de Decisiones', href: '/institucional/banco-de-decisiones' },
  { label: 'Banco de Decisiones JPRD', href: '/institucional/banco-de-decisiones-jprd' },
]

function closeAll() {
  openInstitucionalMenu.value = false
}

/* ---------------- servicios: hash + scroll suave ---------------- */
async function goServicios() {
  closeAll()

  if (isHome.value) {
    // ya estás en home: solo scroll
    await nextTick()
    const el = document.getElementById('servicios')
    el?.scrollIntoView({ behavior: 'smooth', block: 'start' })
    return
  }

  // estás en otra ruta: navega a home con hash
  await router.push({ path: '/', hash: '#servicios' })

  // espera render + scroll
  await nextTick()
  const el = document.getElementById('servicios')
  el?.scrollIntoView({ behavior: 'smooth', block: 'start' })
}

/* ---------------- cerrar modal con ESC ---------------- */
function onKeydown(e) {
  if (e.key === 'Escape' && showBrochure.value) showBrochure.value = false
}
onMounted(() => window.addEventListener('keydown', onKeydown))
onUnmounted(() => window.removeEventListener('keydown', onKeydown))
</script>

<template>
  <header
    :class="[
      'sticky top-0 z-50 w-full bg-white/90 backdrop-blur transition-shadow border-b border-white/20',
      scrolled ? 'shadow-sm' : ''
    ]"
  >
    <nav class="mx-auto max-w-7xl px-4 h-16 flex items-center justify-between">
      <!-- Logo -->
      <div class="flex items-center gap-4">
        <RouterLink to="/" class="flex items-center gap-2" @click="closeAll">
          <img
            src="/img/logo_solo.png"
            alt="Corporación Imperium"
            class="h-12 md:h-16 w-auto object-contain"
          />
        </RouterLink>

        <img
          src="/img/baner_navbar.png"
          alt="Centro de Conciliación, Arbitraje y JPRD"
          class="hidden lg:block h-10 xl:h-12 w-auto object-contain"
        />
      </div>

      <!-- Menu Desktop -->
      <ul class="hidden md:flex items-center gap-6 text-[15px]">
        <!-- Institucional -->
        <li class="relative" @mouseenter="openInstitucional" @mouseleave="closeInstitucional">
          <button
            type="button"
            class="hover:text-primary font-medium"
            :class="{ 'text-primary font-semibold': isActiveStartsWith('/institucional') }"
            aria-haspopup="menu"
            :aria-expanded="openInstitucionalMenu ? 'true' : 'false'"
          >
            Institucional
          </button>

          <transition name="fade">
            <ul
              v-if="openInstitucionalMenu"
              class="absolute left-0 mt-2 bg-white shadow-lg rounded-lg w-56 py-2 z-50 border border-gray-100"
              role="menu"
            >
              <li v-for="item in institucionalItems" :key="item.label">
                <template v-if="item.href">
                  <RouterLink
                    :to="item.href"
                    class="block px-4 py-2 hover:bg-primary/10 hover:text-primary"
                    role="menuitem"
                    @click="closeAll"
                  >
                    {{ item.label }}
                  </RouterLink>
                </template>

                <template v-else>
                  <button
                    type="button"
                    @click="item.action(); closeAll()"
                    class="w-full text-left block px-4 py-2 hover:bg-primary/10 hover:text-primary"
                    role="menuitem"
                  >
                    {{ item.label }}
                  </button>
                </template>
              </li>
            </ul>
          </transition>
        </li>

        <!-- Servicios (scroll inteligente) -->
        <li>
          <button type="button" @click="goServicios" class="hover:text-primary font-medium">
            Servicios
          </button>
        </li>

        <li>
          <RouterLink to="/contacto" class="hover:text-primary font-medium" @click="closeAll">
            Contacto
          </RouterLink>
        </li>

        <li>
          <RouterLink to="/blog" class="hover:text-primary font-medium" @click="closeAll">
            Blog
          </RouterLink>
        </li>

        <li>
          <a
            href="https://sirea.imperium.pe/"
            target="_blank"
            class="inline-block rounded-xl bg-primary text-white px-4 py-2 font-semibold hover:bg-primary-dark"
          >
            SIREA
          </a>
        </li>
      </ul>
    </nav>
  </header>

  <!-- Modal PDF -->
  <div
    v-if="showBrochure"
    class="fixed inset-0 bg-black/70 z-[999] flex items-center justify-center p-4"
    @click.self="showBrochure = false"
  >
    <div class="bg-white rounded-lg shadow-xl max-w-5xl w-full relative">
      <button
        type="button"
        @click="showBrochure = false"
        class="absolute top-2 right-2 bg-primary text-white rounded-full w-8 h-8 flex items-center justify-center hover:bg-primary-dark"
        title="Cerrar"
      >
        ✕
      </button>

      <iframe
        src="/archivos/BROCHURE.pdf"
        class="w-full h-[80vh] rounded-b-lg"
        frameborder="0"
      />
    </div>
  </div>
</template>

<style scoped>
.fade-enter-active, .fade-leave-active { transition: opacity 0.2s ease; }
.fade-enter-from, .fade-leave-to { opacity: 0; }
</style>
