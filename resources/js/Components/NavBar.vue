<script setup>
import { ref, onMounted, onUnmounted, computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

// Estado UI
const open = ref(false)
const scrolled = ref(false)
const checkScroll = () => { scrolled.value = window.scrollY > 4 }
onMounted(() => { checkScroll(); window.addEventListener('scroll', checkScroll) })
onUnmounted(() => window.removeEventListener('scroll', checkScroll))

// Ruta activa
const page = usePage()
const pathname = computed(() => (page.url || '/').split('?')[0])
const isActive = (href) => pathname.value === href

// Submenú Institucional
const institucionalOpen = ref(false)
let hoverTimer
const openInstitucional = () => { clearTimeout(hoverTimer); institucionalOpen.value = true }
const closeInstitucional = () => { hoverTimer = setTimeout(() => (institucionalOpen.value = false), 120) }

// Modal PDF
const showBrochure = ref(false)

const institucionalItems = [
  { label: '¿Quiénes somos?',     href: '/institucional/quienes-somos' },
  { label: 'Unidad de Gobierno',  href: '/institucional/unidad-de-gobierno' },
  { label: 'Normas Legales',      href: '/institucional/normas-legales' },
  { label: 'Ver Brochure',        action: () => (showBrochure.value = true) }, // 👈 Abre el modal
  { label: 'Banco de Laudos',     href: '/institucional/banco-de-laudos' },
  { label: 'Banco de Decisiones', href: '/institucional/banco-de-decisiones' },
]
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
      <Link href="/" class="flex items-center gap-2 font-semibold text-neutral">
        <img src="/img/logo_solo.png" alt="Logo" class="h-12 md:h-16 w-auto object-contain" />
      </Link>

      <!-- Menú escritorio -->
      <ul id="menu-principal" class="hidden md:flex items-center gap-6 text-[15px]">
        <li
          class="relative"
          @mouseenter="openInstitucional"
          @mouseleave="closeInstitucional"
        >
          <button
            class="hover:text-primary font-medium"
            :class="{ 'text-primary font-semibold': pathname === '/institucional' }"
          >
            Institucional
          </button>

          <!-- Submenú -->
          <transition name="fade">
            <ul
              v-if="institucionalOpen"
              class="absolute left-0 mt-2 bg-white shadow-lg rounded-lg w-56 py-2 z-50 border border-gray-100"
            >
              <li v-for="item in institucionalItems" :key="item.label">
                <template v-if="item.href">
                  <Link
                    :href="item.href"
                    class="block px-4 py-2 hover:bg-primary/10 hover:text-primary"
                  >
                    {{ item.label }}
                  </Link>
                </template>
                <template v-else-if="item.action">
                  <button
                    @click="item.action"
                    class="w-full text-left block px-4 py-2 hover:bg-primary/10 hover:text-primary"
                  >
                    {{ item.label }}
                  </button>
                </template>
              </li>
            </ul>
          </transition>
        </li>

        <li><Link href="/servicios" class="hover:text-primary">Nuestros Servicios</Link></li>
        <li><Link href="/contacto" class="hover:text-primary">Contacto</Link></li>
        <li><Link href="/blog" class="hover:text-primary">Blog</Link></li>
        <li>
          <a
            href="/"
            class="inline-block rounded-xl bg-primary text-white px-4 py-2 font-semibold hover:bg-primary-dark"
          >
            SIREA
          </a>
        </li>
      </ul>
    </nav>
  </header>

  <!-- === MODAL PDF === -->
  <div
    v-if="showBrochure"
    class="fixed inset-0 bg-black/70 z-[999] flex items-center justify-center p-4"
  >
    <div class="bg-white rounded-lg shadow-xl max-w-5xl w-full relative">
      <button
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
      ></iframe>
    </div>
  </div>
</template>

<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.2s ease;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}
</style>
