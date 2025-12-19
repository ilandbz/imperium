<script setup>
import { ref, onMounted } from 'vue'

const SHOW_MS   = 1800    // duración visible (ms)
const SHOW_ONCE = false    // mostrar solo una vez por sesión
const KEY       = 'imperium:splashShown'

const visible = ref(false)
const emit = defineEmits(['hidden'])
onMounted(() => {

  if (SHOW_ONCE && sessionStorage.getItem(KEY)) return
  visible.value = true
  setTimeout(() => {
    visible.value = false
    if (SHOW_ONCE) sessionStorage.setItem(KEY, '1')
    emit('hidden')
  }, SHOW_MS)


})
</script>

<template>
  <!-- Contenedor SIEMPRE presente; sólo ocultamos con v-show -->
  <div
    class="fixed inset-0 z-[9999] flex items-center justify-center
           bg-gradient-to-br from-primary to-primary-dark"
    v-show="visible"
    aria-live="polite" aria-busy="true"
  >
    <!-- Fade del contenido, no del root -->
    <transition name="fade">
      <div v-if="visible" class="flex flex-col items-center text-center gap-5 px-6">
        <img
          src="/img/logo_sin_fondo.png"
          alt="Corporación IMPERIUM"
          class="w-44 md:w-60 h-auto object-contain"
          style="filter: brightness(0) invert(1);" 
        />

        <p class="max-w-xl text-white/90 font-semibold tracking-wide">
          Centro de Arbitraje y Junta de Prevención y Resolución de Disputas
        </p>

        <div class="mt-2 w-10 h-10 border-4 border-white/30 border-t-white rounded-full animate-spin"></div>
      </div>
    </transition>
  </div>
</template>

<style scoped>
.fade-enter-active, .fade-leave-active { transition: opacity .45s ease; }
.fade-enter-from, .fade-leave-to { opacity: 0; }
</style>
