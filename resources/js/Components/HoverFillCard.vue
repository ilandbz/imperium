<template>
  <component :is="as" :class="wrapperClass">
    <div
      class="group relative w-full overflow-hidden rounded-xl
             border border-black/5
             transition-shadow duration-300 ease-[cubic-bezier(0.2,0.8,0.2,1)]
             shadow-[0_6px_18px_-8px_rgba(0,0,0,0.2)]
             motion-safe:hover:-translate-y-[4px]
             hover:shadow-[0_20px_45px_-12px_rgba(0,0,0,0.35)]"
      :class="containerClass"
      :tabindex="clickable ? 0 : undefined"
      :role="clickable ? 'button' : undefined"
    >
      <!-- Base en blanco -->
      <div class="absolute inset-0 bg-white"></div>

      <!-- Línea izquierda fija -->
      <div class="absolute left-0 top-0 h-full w-[6px] bg-primary z-[1]"></div>

      <!-- Overlay que se expande en hover (izq → der) -->
      <div
        class="absolute inset-y-0 left-0 w-0 z-[0]
               transition-[width] duration-500 ease-out
               group-hover:w-full"
        :class="fillColor"
        style="border-radius: inherit"
      ></div>

      <!-- Contenido -->
      <div
        class="relative z-[2] transition-colors duration-300 px-6 py-5"
        :class="contentClass"
      >
        <div class="text-current">
          <slot />
        </div>
      </div>

      <!-- Acción (ej: botón flecha) -->
      <div class="absolute right-4 bottom-4 z-[3]">
        <slot name="action" />
      </div>
    </div>
  </component>
</template>

<script setup>
const props = defineProps({
  as: { type: String, default: 'div' },
  clickable: { type: Boolean, default: false },

  // Color del “relleno” (usa tu bg-primary o un hex)
  fillColor: { type: String, default: 'bg-primary' },

  // Personalización desde fuera
  wrapperClass: { type: String, default: '' },
  containerClass: { type: String, default: '' },

  // Texto: oscuro en reposo → blanco en hover
  contentClass: { type: String, default: 'text-slate-900 group-hover:text-white' }
})
</script>
