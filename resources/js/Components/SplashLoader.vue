<script setup>
import { ref, onMounted } from 'vue'

const visible = ref(false)

// Configura duración (ms)
const SHOW_MS = 1600     // tiempo visible antes de empezar a ocultar
const KEY = 'imperium:splashShown' // evita mostrarlo más de una vez por sesión

onMounted(() => {
  if (sessionStorage.getItem(KEY)) return
  visible.value = true
  setTimeout(() => {
    visible.value = false
    sessionStorage.setItem(KEY, '1')
  }, SHOW_MS)
})
</script>

<template>
  <transition name="fade">
    <div
      v-if="visible"
      class="fixed inset-0 z-[9999] flex items-center justify-center bg-white"
      aria-live="polite"
      aria-busy="true"
    >
      <div class="flex flex-col items-center gap-4 px-6 text-center">
        <div class="relative">
          <!-- LOGO -->
          <img
            src="/img/logo.png"
            alt="Corporación IMPERIUM"
            class="w-90 md:w-56 h-auto object-contain animate-pulse"
          />
          <!-- Glow -->
          <div class="pointer-events-none absolute -inset-6 rounded-full bg-primary/20 blur-2xl animate-ping"></div>
        </div>

        <!-- Slogan -->
        <p class="max-w-xl text-sm md:text-base font-semibold text-neutral/80">
          Centro de Arbitraje y Junta de Prevención y Resolución de Disputas
        </p>

        <!-- Barra de progreso simple -->
        <div class="mt-1 h-1 w-48 rounded-full bg-primary/15 overflow-hidden">
          <div class="h-full w-1/3 bg-primary animate-slide"></div>
        </div>
      </div>
    </div>
  </transition>
</template>

<style scoped>
.fade-enter-active, .fade-leave-active { transition: opacity .4s ease; }
.fade-enter-from, .fade-leave-to { opacity: 0; }

/* keyframes de la barrita */
@keyframes slide {
  0%   { transform: translateX(-120%); }
  50%  { transform: translateX(30%); }
  100% { transform: translateX(120%); }
}
.animate-slide { animation: slide 3.2s ease-in-out infinite; }
</style>
