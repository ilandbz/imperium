<!-- components/CertificationsModal.vue -->
<script setup>
import { computed, onMounted, onBeforeUnmount, watch } from 'vue'

const props = defineProps({
  modelValue: { type: Boolean, default: false },
  lockScroll: { type: Boolean, default: true },
  images: {
    type: Array,
    default: () => ([
      'img/inicio_modal/img1.jpeg',
      'img/inicio_modal/img2.jpeg',
    ])
  }
})

const emit = defineEmits(['update:modelValue'])

const open = computed({
  get: () => props.modelValue,
  set: v => emit('update:modelValue', v)
})

function close() { open.value = false }
function onKey(e) { if (e.key === 'Escape') close() }

onMounted(() => window.addEventListener('keydown', onKey))
onBeforeUnmount(() => window.removeEventListener('keydown', onKey))

// Bloqueo de scroll del documento cuando está abierto
watch(open, (v) => {
  if (!props.lockScroll) return
  const root = document.documentElement
  root.style.overflow = v ? 'hidden' : ''
})
</script>

<template>
  <teleport to="body">
    <transition name="fade">
      <div
        v-if="open"
        class="fixed inset-0 z-[9999] bg-black/70"
        aria-modal="true"
        role="dialog"
      >
        <!-- Click fuera para cerrar -->
        <div class="absolute inset-0" @click="close" />

        <!-- Contenedor centrado -->
        <div class="relative h-full w-full flex items-center justify-center p-3 sm:p-6">
          <transition name="dialog">
            <!-- “Card” SIN fondo blanco; solo contiene el contenido -->
            <div
              v-show="open"
              class="relative w-full max-w-4xl
                     max-h-[calc(100vh-2.5rem)]
                     rounded-2xl overflow-hidden
                     shadow-2xl"
              @click.stop
            >
              <!-- Botón cerrar encima de la imagen -->
              <button
                type="button"
                class="absolute top-3 right-3 z-20
                       w-10 h-10 rounded-full
                       bg-black/55 hover:bg-black/70
                       text-white text-2xl leading-none
                       flex items-center justify-center
                       backdrop-blur-sm"
                @click="close"
                aria-label="Cerrar"
                title="Cerrar"
              >
                ×
              </button>

              <!-- Área scrolleable (como tu captura: barra a la derecha) -->
              <div class="relative z-10 max-h-[calc(100vh-2.5rem)] overflow-y-auto">
                <!-- Lista de imágenes, ocupan todo el ancho -->
                <div class="space-y-0">
                  <img
                    v-for="(src, i) in images"
                    :key="i"
                    :src="src"
                    class="w-full h-auto block select-none"
                    alt=""
                    loading="lazy"
                    draggable="false"
                  />
                </div>
              </div>

              <!-- Sutil degradado inferior opcional para dar “cierre” visual -->
              <div class="pointer-events-none absolute inset-x-0 bottom-0 h-20 z-10 bg-gradient-to-t from-black/35 to-transparent" />
            </div>
          </transition>
        </div>
      </div>
    </transition>
  </teleport>
</template>

<style scoped>
.fade-enter-active, .fade-leave-active { transition: opacity .20s ease; }
.fade-enter-from, .fade-leave-to { opacity: 0; }

.dialog-enter-active, .dialog-leave-active {
  transition: opacity .22s ease, transform .22s ease;
}
.dialog-enter-from, .dialog-leave-to {
  opacity: 0;
  transform: translateY(10px) scale(.985);
}

/* Scrollbar más bonita (webkit) */
@media (min-width: 0px) {
  .max-h-\[calc\(100vh-2\.5rem\)\]::-webkit-scrollbar { width: 10px; }
  .max-h-\[calc\(100vh-2\.5rem\)\]::-webkit-scrollbar-track { background: rgba(255,255,255,.08); }
  .max-h-\[calc\(100vh-2\.5rem\)\]::-webkit-scrollbar-thumb {
    background: rgba(255,255,255,.25);
    border-radius: 999px;
  }
  .max-h-\[calc\(100vh-2\.5rem\)\]::-webkit-scrollbar-thumb:hover { background: rgba(255,255,255,.35); }
}
</style>
