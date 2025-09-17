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
const pathname = computed(() => {
  // page.url viene como "/ruta?query"; tomamos solo la ruta
  return (page.url || '/').split('?')[0]
})
const isActive = (href) => pathname.value === href
</script>

<template>
  <header
    :class="[
      'sticky top-0 z-50 w-full bg-white/90 backdrop-blur transition-shadow border-b border-white/20',
      scrolled ? 'shadow-sm' : ''
    ]"
  >
    <nav class="mx-auto max-w-7xl px-4 h-16 flex items-center justify-between">
      <!-- Marca IMPERIUM -->
      <Link href="/" class="flex items-center gap-2 font-semibold text-neutral"> <img src="/img/logo_sin_fondo.png" alt="Logo" class="h-12 md:h-16 lg:h-20 w-auto object-contain shrink-0" /> </Link>

      <!-- Botón menú móvil -->
      <button
        class="md:hidden inline-flex items-center justify-center rounded-md p-2 text-neutral hover:bg-neutral/5"
        @click="open = !open"
        :aria-expanded="open"
        aria-controls="menu-principal"
        aria-label="Abrir / cerrar menú"
      >
        <span v-if="!open">☰</span>
        <span v-else>✕</span>
      </button>

      <!-- Menú escritorio -->
      <ul id="menu-principal" class="hidden md:flex items-center gap-6 text-[15px]">
        <li>
          <Link href="/institucional" :class="isActive('/institucional') ? 'text-primary font-semibold' : 'hover:text-primary'">
            Institucional
          </Link>
        </li>
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
          <!-- CTA principal -->
          <a
            href="/"
            class="inline-block rounded-xl bg-primary text-white px-4 py-2 font-semibold hover:bg-primary-dark focus:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 shadow-sm hover:shadow transition-colors"
            aria-label="Plataforma IMPERIUM"
          >
            PLATAFORMA IMPERIUM
          </a>
        </li>
      </ul>
    </nav>

    <!-- Menú móvil -->
    <div v-show="open" class="md:hidden border-t border-neutral/10 bg-white/95">
      <ul class="px-4 py-3 space-y-2 text-[15px]">
        <li><Link href="/institucional" class="block py-2" @click="open=false">Institucional</Link></li>
        <li><Link href="/servicios" class="block py-2" @click="open=false">Nuestros Servicios</Link></li>
        <li><a href="/academico" class="block py-2" @click="open=false">Académico ↗</a></li>
        <li><Link href="/contacto" class="block py-2" @click="open=false">Contacto</Link></li>
        <li><Link href="/blog" class="block py-2" @click="open=false">Blog</Link></li>
        <li class="pt-2">
          <a
            href="/plataforma"
            class="block text-center rounded-xl border border-primary text-primary px-4 py-2 font-semibold hover:bg-primary hover:text-white"
            @click="open=false"
          >
            PLATAFORMA IMPERIUM
          </a>
        </li>
      </ul>
    </div>
  </header>
</template>
