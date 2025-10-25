<!-- components/CertificationsModal.vue -->
<script setup>
import { computed, onMounted, onBeforeUnmount, watch } from 'vue'

const props = defineProps({
  modelValue: { type: Boolean, default: false },
  iso9001: { type: String, default: '/docs/iso-9001-2015.pdf' },
  iso37001: { type: String, default: '/docs/iso-37001-2016.pdf' },
  iso27001: { type: String, default: '/docs/iso-27001-2022.pdf' },
  logoAcs: { type: String, default: '/img/acs.webp' },
  lockScroll: { type: Boolean, default: true },
})

const emit = defineEmits(['update:modelValue'])
const open = computed({
  get: () => props.modelValue,
  set: v => emit('update:modelValue', v)
})

function close() { open.value = false }

// Cerrar con ESC
function onKey(e) { if (e.key === 'Escape') close() }

onMounted(() => window.addEventListener('keydown', onKey))
onBeforeUnmount(() => window.removeEventListener('keydown', onKey))

// Bloqueo de scroll cuando está abierto
watch(open, (v) => {
  if (!props.lockScroll) return
  document.documentElement.style.overflow = v ? 'hidden' : ''
})
</script>

<template>
  <teleport to="body">
    <!-- Overlay con fade -->
    <transition name="fade">
      <div
        v-if="open"
        class="fixed inset-0 z-[9999] flex items-start sm:items-center justify-center bg-black/50 p-4"
        aria-modal="true"
        role="dialog"
      >
        <!-- Cierre al click en overlay -->
        <div class="absolute inset-0" @click="close" />

        <!-- Diálogo con animación -->
        <transition name="dialog">
          <div
            v-show="open"
            class="relative w-full max-w-3xl bg-white rounded-2xl shadow-xl overflow-hidden"
          >
            <!-- header -->
            <div class="flex items-center justify-between px-6 py-4 border-b">
              <h3 class="text-xl font-bold text-primary">Certificaciones</h3>
              <button class="text-primary hover:text-primary/80 font-bold text-lg" @click="close" aria-label="Cerrar">×</button>
            </div>

            <!-- body -->
            <div class="px-6 py-5 space-y-6">
              <p class="text-neutral-700">
                Nuestro compromiso con la excelencia se refleja en certificaciones internacionales:
                <b>ISO 9001:2015</b>, <b>ISO 37001:2016</b> e <b>ISO 27001:2022</b>.
              </p>

                <div class="flex flex-col sm:flex-row flex-wrap justify-center items-center gap-12 mt-4">
                    <!-- ISO 9001 -->
                    <div class="flex flex-col items-center gap-4">
                    <img src="/img/iso-9001.jpg" alt="ISO 9001" class="w-40 h-40 object-contain" />
                    <a href="/archivos/iso-9001.pdf" target="_blank"
                        class="bg-primary text-white px-6 py-2 rounded-xl font-semibold flex items-center gap-2 hover:bg-primary-dark transition">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="22" height="22" class="fill-white"><path d="M448 304h-53.5l-48 48H448c8.822 0 16 7.178 16 16v80c0 8.822-7.178 16-16 16H64c-8.822 0-16-7.178-16-16v-80c0-8.8 7.18-16 16-16h101.5l-48-48H64c-35.35 0-64 28.65-64 64v80c0 35.35 28.65 64 64 64h384c35.35 0 64-28.65 64-64v-80c0-35.3-28.7-64-64-64zM257 368.1l136-136c9.375-9.375 9.375-24.56 0-33.94s-24.56-9.375-33.94 0L280 294.1V24c0-13.25-10.7-24-24-24s-24 10.75-24 24v270.1L136.1 199c-9.375-9.375-24.56-9.375-33.94 0s-9.375 24.56 0 33.94L239 368.1c4.7 5.6 10.8 7.9 17 7.9s12.3-2.3 17-7.9z"/></svg>
                        ISO 9001:2015
                    </a>
                    </div>

                    <!-- ISO 37001 -->
                    <div class="flex flex-col items-center gap-4">
                    <img src="/img/iso-37001.jpg" alt="ISO 37001" class="w-40 h-40 object-contain" />
                    <a href="/archivos/iso-37001.pdf" target="_blank"
                        class="bg-primary text-white px-6 py-2 rounded-xl font-semibold flex items-center gap-2 hover:bg-primary-dark transition">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="22" height="22" class="fill-white"><path d="M448 304h-53.5l-48 48H448c8.822 0 16 7.178 16 16v80c0 8.822-7.178 16-16 16H64c-8.822 0-16-7.178-16-16v-80c0-8.8 7.18-16 16-16h101.5l-48-48H64c-35.35 0-64 28.65-64 64v80c0 35.35 28.65 64 64 64h384c35.35 0 64-28.65 64-64v-80c0-35.3-28.7-64-64-64zM257 368.1l136-136c9.375-9.375 9.375-24.56 0-33.94s-24.56-9.375-33.94 0L280 294.1V24c0-13.25-10.7-24-24-24s-24 10.75-24 24v270.1L136.1 199c-9.375-9.375-24.56-9.375-33.94 0s-9.375 24.56 0 33.94L239 368.1c4.7 5.6 10.8 7.9 17 7.9s12.3-2.3 17-7.9z"/></svg>
                        ISO 37001:2016
                    </a>
                    </div>

                    <!-- ISO 27001 -->
                    <div class="flex flex-col items-center gap-4">
                    <img src="/img/iso-27001.webp" alt="ISO 27001" class="w-40 h-40 object-contain" />
                    <a href="/archivos/iso-27001.pdf" target="_blank"
                        class="bg-primary text-white px-6 py-2 rounded-xl font-semibold flex items-center gap-2 hover:bg-primary-dark transition">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="22" height="22" class="fill-white"><path d="M448 304h-53.5l-48 48H448c8.822 0 16 7.178 16 16v80c0 8.822-7.178 16-16 16H64c-8.822 0-16-7.178-16-16v-80c0-8.8 7.18-16 16-16h101.5l-48-48H64c-35.35 0-64 28.65-64 64v80c0 35.35 28.65 64 64 64h384c35.35 0 64-28.65 64-64v-80c0-35.3-28.7-64-64-64zM257 368.1l136-136c9.375-9.375 9.375-24.56 0-33.94s-24.56-9.375-33.94 0L280 294.1V24c0-13.25-10.7-24-24-24s-24 10.75-24 24v270.1L136.1 199c-9.375-9.375-24.56-9.375-33.94 0s-9.375 24.56 0 33.94L239 368.1c4.7 5.6 10.8 7.9 17 7.9s12.3-2.3 17-7.9z"/></svg>
                        ISO 27001:2022
                    </a>
                    </div>
                </div>

              <div class="text-sm text-neutral-600">
                Mantenemos altos estándares de calidad, prevención de prácticas corruptas y seguridad de la información.
              </div>
            </div>

            <!-- footer -->
            <div class="px-6 py-4 border-t flex justify-end">
              <button class="px-4 py-2 rounded-lg border border-primary text-primary hover:bg-primary/5" @click="close">
                Cerrar
              </button>
            </div>
          </div>
        </transition>
      </div>
    </transition>
  </teleport>
</template>

<style scoped>
/* Fade para el overlay */
.fade-enter-active, .fade-leave-active { transition: opacity .25s ease; }
.fade-enter-from,  .fade-leave-to      { opacity: 0; }

/* Animación del diálogo */
.dialog-enter-active, .dialog-leave-active { transition: opacity .25s ease, transform .25s ease; }
.dialog-enter-from,  .dialog-leave-to      { opacity: 0; transform: translateY(8px) scale(.98); }
</style>
