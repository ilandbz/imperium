<script setup>
import { ref, onMounted, onUnmounted, computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

// estado UI
const open = ref(false)
const scrolled = ref(false)
const checkScroll = () => { scrolled.value = window.scrollY > 4 }
onMounted(() => { checkScroll(); window.addEventListener('scroll', checkScroll) })
onUnmounted(() => window.removeEventListener('scroll', checkScroll))

// ruta activa (desde Inertia)
const page = usePage()
const pathname = computed(() => (page.url || '/').split('?')[0])
const isActive = (href) => pathname.value === href

const institucionalOpen = ref(false)      // desktop
const institucionalMobileOpen = ref(false) // mobile

const institucionalItems = [
  { label: '¿Quiénes somos?',     href: '/institucional/quienes-somos' },
  { label: 'Unidad de Gobierno',  href: '/institucional/unidad-de-gobierno' },
  { label: 'Normas Legales',      href: '/institucional/normas-legales' },
  { label: 'Ver Brochure',        href: '/institucional/brochure' },
  { label: 'Banco de Laudos',     href: '/institucional/banco-de-laudos' },
  { label: 'Banco de Decisiones', href: '/institucional/banco-de-decisiones' },
]

// helpers hover con leve delay para no “cortar” al mover el mouse
let hoverTimer
const openInstitucional = () => { clearTimeout(hoverTimer); institucionalOpen.value = true }
const closeInstitucional = () => { hoverTimer = setTimeout(() => (institucionalOpen.value = false), 120) }


</script>

<template>
  <header
    :class="[
      'sticky top-0 z-50 w-full bg-white/90 backdrop-blur transition-shadow border-b border-white/20',
      scrolled ? 'shadow-sm' : ''
    ]"
  >
    <nav class="mx-auto max-w-7xl px-4 h-16 flex items-center justify-between">
      <!-- Marca -->
      <Link href="/" class="flex items-center gap-2 font-semibold text-neutral">
        <img src="/img/logo_solo.png" alt="Logo" class="h-12 md:h-16 w-auto object-contain shrink-0" />
      </Link>

      <!-- Botón menú móvil -->
      <button
        class="md:hidden inline-flex items-center justify-center rounded-md p-2 text-neutral hover:bg-neutral/5"
        @click="open = !open"
        :aria-expanded="open"
        aria-controls="menu-principal"
        aria-label="Abrir / cerrar menú"
      >
        <span v-if="!open">☰</span><span v-else>✕</span>
      </button>

      <!-- ===== Menú ESCRITORIO ===== -->
      <ul id="menu-principal" class="hidden md:flex items-center gap-6 text-[15px]">
        <!-- INSTITUCIONAL con submenú -->
        <li class="relative"
            @mouseenter="openInstitucional"
            @mouseleave="closeInstitucional">
          <!-- trigger -->
          <button
            class="inline-flex items-center gap-1 hover:text-primary"
            :class="isActive('/institucional') ? 'text-primary font-semibold' : ''"
            aria-haspopup="true"
            :aria-expanded="institucionalOpen"
            @focus="openInstitucional"
            @blur="closeInstitucional"
          >
            Institucional
            <svg class="w-4 h-4 transition-transform"
                 :class="institucionalOpen ? 'rotate-180' : ''"
                 viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.158l3.71-2.93a.75.75 0 11.94 1.16l-4.2 3.32a.75.75 0 01-.94 0l-4.2-3.32a.75.75 0 01-.02-1.06z" clip-rule="evenodd"/>
            </svg>
          </button>

          <!-- dropdown -->
          <div
            v-show="institucionalOpen"
            class="absolute left-1/2 -translate-x-1/2 mt-3 w-64 bg-white shadow-xl rounded-xl border border-neutral/10 p-2"
            @mouseenter="openInstitucional"
            @mouseleave="closeInstitucional"
          >
            <ul class="py-1">
              <li v-for="(item, i) in institucionalItems" :key="i">
                <Link
                  :href="item.href"
                  class="block px-4 py-2 rounded-md text-[15px] hover:bg-primary/10 hover:text-primary"
                >
                  {{ item.label }}
                </Link>
              </li>
            </ul>
          </div>
        </li>

        <!-- otros items -->
        <li>
          <Link href="/servicios" :class="isActive('/servicios') ? 'text-primary font-semibold' : 'hover:text-primary'">
            Nuestros Servicios
          </Link>
        </li>
        <li>
          <Link href="/contacto" :class="isActive('/contacto') ? 'text-primary font-semibold' : 'hover:text-primary'">
            Contacto
          </Link>
        </li>
        <li>
          <Link href="/blog" :class="isActive('/blog') ? 'text-primary font-semibold' : 'hover:text-primary'">
            Blog
          </Link>
        </li>
        <li>
          <a
            href="/"
            class="inline-block rounded-xl bg-primary text-white px-4 py-2 font-semibold hover:bg-primary-dark focus:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 shadow-sm transition"
            aria-label="Plataforma IMPERIUM"
            title="Sistema de Registro y Ejecución Arbitral"
          >
            SIREA
          </a>
        </li>
      </ul>
    </nav>

    <!-- ===== Menú MÓVIL ===== -->
    <div v-show="open" class="md:hidden border-t border-neutral/10 bg-white/95">
      <ul class="px-4 py-3 space-y-2 text-[15px]">
        <!-- Institucional con acordeón -->
        <li>
          <button
            class="w-full flex items-center justify-between py-2 font-medium"
            @click="institucionalMobileOpen = !institucionalMobileOpen"
            :aria-expanded="institucionalMobileOpen"
          >
            <span>Institucional</span>
            <svg class="w-4 h-4 transition-transform"
                 :class="institucionalMobileOpen ? 'rotate-180' : ''"
                 viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.158l3.71-2.93a.75.75 0 11.94 1.16l-4.2 3.32a.75.75 0 01-.94 0l-4.2-3.32a.75.75 0 01-.02-1.06z" clip-rule="evenodd"/>
            </svg>
          </button>

          <transition enter-active-class="transition duration-150 ease-out"
                      enter-from-class="opacity-0 -translate-y-1"
                      enter-to-class="opacity-100 translate-y-0"
                      leave-active-class="transition duration-100 ease-in"
                      leave-from-class="opacity-100 translate-y-0"
                      leave-to-class="opacity-0 -translate-y-1">
            <ul v-show="institucionalMobileOpen" class="pl-3 pb-2 space-y-1">
              <li v-for="(item, i) in institucionalItems" :key="'m-'+i">
                <Link :href="item.href" class="block py-1.5 text-neutral hover:text-primary" @click="open=false">
                  {{ item.label }}
                </Link>
              </li>
            </ul>
          </transition>
        </li>

        <!-- otros items móvil -->
        <li><Link href="/servicios" class="block py-2" @click="open=false">Nuestros Servicios</Link></li>
        <li><Link href="/contacto" class="block py-2" @click="open=false">Contacto</Link></li>
        <li><Link href="/blog" class="block py-2" @click="open=false">Blog</Link></li>

        <li class="pt-2">
          <a href="/plataforma"
             class="block text-center rounded-xl border border-primary text-primary px-4 py-2 font-semibold hover:bg-primary hover:text-white"
             @click="open=false">
            PLATAFORMA IMPERIUM
          </a>
        </li>
      </ul>
    </div>
  </header>
</template>
