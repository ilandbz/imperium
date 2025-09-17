<script setup>
import { computed } from 'vue'
import ServiceCard from '@/Components/ServiceCard.vue'

const props = defineProps({
  services: { type: Array, default: () => [] },
})

/* Fallback con servicios IMPERIUM si aún no vienen desde backend */
const items = computed(() =>
  (props.services && props.services.length ? props.services : [
    {
      title: 'Arbitraje en Contrataciones del Estado',
      excerpt: 'Administración integral de procesos arbitrales bajo normativa de contrataciones del Estado.',
      icon: '⚖️',
      href: '/servicios#arbitraje',
    },
    {
      title: 'Junta de Prevención y Resolución de Disputas (JPRD)',
      excerpt: 'Conformación y administración de JPRD para proyectos de infraestructura y obras.',
      icon: '🛡️',
      href: '/servicios#jprd',
    },
    {
      title: 'Secretaría Arbitral',
      excerpt: 'Mesa de partes, notificaciones, custodia de expedientes y soporte procedimental.',
      icon: '📑',
      href: '/servicios#secretaria',
    },
    {
      title: 'Capacitaciones y Programas Académicos',
      excerpt: 'Formación especializada en contratación pública, arbitraje y prevención de controversias.',
      icon: '🎓',
      href: '/servicios#academico',
    },
    {
      title: 'Prevención y Gestión de Controversias',
      excerpt: 'Consultoría para mitigación de riesgos y solución temprana de disputas.',
      icon: '🧭',
      href: '/servicios#prevencion',
    },
    {
      title: 'Mesa de Partes Virtual (MPV)',
      excerpt: 'Recepción digital de escritos y solicitudes con trazabilidad y alertas.',
      icon: '📬',
      href: '/servicios#mpv',
    },
  ])
)
</script>

<template>
  <!-- usa el id "servicios" para que coincida con el menú en español -->
  <section id="servicios" class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-center text-3xl font-extrabold">NUESTROS SERVICIOS</h2>
    <p class="text-center text-neutral/70 mt-2">
      Soluciones especializadas en arbitraje y prevención de disputas
    </p>

    <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
      <ServiceCard v-for="(s, i) in items" :key="i" :item="s" />
    </div>

    <div class="mt-10 text-center">
      <a
        href="/servicios"
        class="inline-block rounded-xl border border-primary text-primary px-5 py-2.5 font-semibold hover:bg-primary hover:text-white transition-colors"
      >
        Ver todos los servicios
      </a>
    </div>
  </section>
</template>
