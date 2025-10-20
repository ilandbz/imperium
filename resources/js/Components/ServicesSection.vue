<script setup>
import { computed } from 'vue'
import ServiceCard from '@/Components/ServiceCard.vue'

const props = defineProps({
  services: {
    type: Array,
    default: () => [],
    // cada item: { title, href, image }
  },
  aosOnce: { type: Boolean, default: true }
})

const hasItems = computed(() => props.services && props.services.length > 0)
</script>

<template>
  <section id="servicios"
           data-aos="fade-up"
           :data-aos-once="aosOnce"
           class="max-w-7xl mx-auto w-full py-8 px-4 md:py-12
                  flex flex-col items-center justify-center servicios-section overflow-x-hidden">
    <a href="#servicios" title="servicios" class="no-underline hover:no-underline">
      <h3 class="subtitle">Nuestros Servicios</h3>
    </a>

    <p class="text-justify text-gray-700 mb-8 font-semibold text-xl">
      Contamos con los mejores servicios a tu disposición
    </p>

    <!-- GRID DESKTOP -->
    <ul v-if="hasItems" class="hidden lg:grid grid-cols-4 gap-8">
      <li v-for="(s, i) in services" :key="i">
        <ServiceCard :title="s.title" :href="s.href" :image="s.image" />
      </li>
    </ul>

    <!-- CARRUSEL MOBILE/TABLET (sin JS) -->
    <div class="lg:hidden w-full relative">
      <ul class="flex gap-3 overflow-x-auto snap-x snap-mandatory pb-2 -mx-1 px-1">
        <li v-for="(s, i) in services" :key="`m-${i}`"
            class="snap-start shrink-0 w-[85%] sm:w-[60%]">
          <a :href="s.href" :title="s.title"
             class="!flex flex-col justify-center items-center gap-2 shadow-custom
                    rounded-3xl my-1.5 p-2 relative group overflow-hidden w-full h-[250px] card-service">
            <div class="animation-scale2 w-[140px] h-[140px] rounded-full bg-center bg-cover"
                 :style="`background-image:url('${s.image}')`" />
            <h3 class="text-primary text-[1.40rem] font-medium text-center bg-white px-2 animation-scale2">
              {{ s.title }}
            </h3>
          </a>
        </li>
      </ul>
    </div>

    <!-- (opcional) placeholder si no hay items -->
    <div v-if="!hasItems" class="text-gray-500">Sin servicios por mostrar.</div>
  </section>
</template>

<style scoped>
/* sombras/utilidades mínimas si no las tienes ya */
.shadow-custom { box-shadow: 0 6px 20px rgba(0,0,0,.08); }
.animation-scale2 { transition: transform .35s ease; }
.card-service:hover .animation-scale2 { transform: scale(1.05); }

/* altura cómoda del carrusel en móvil */
#servicios .snap-x .card-service { min-height: 250px; }
</style>
