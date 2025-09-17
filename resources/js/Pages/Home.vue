<!-- resources/js/Pages/Home.vue -->
<script setup>
import SiteLayout from '@/Layouts/SiteLayout.vue'
import HeroSplit from '@/Components/HeroSplit.vue'
import ServicesSection from '@/Components/ServicesSection.vue'
import ContactSection from '@/Components/ContactSection.vue'
import FloatingWhatsApp from '@/Components/FloatingWhatsApp.vue'

const props = defineProps({
  services: { type: Array, default: () => [] } // si vienen desde Laravel
})

// Fallback IMPERIUM en español
const localServices = [
  {
    title: 'Arbitraje en Contrataciones del Estado',
    excerpt: 'Administración integral de procesos arbitrales bajo la normativa de contrataciones del Estado.',
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
]
</script>

<template>
  <SiteLayout>
    <HeroSplit
      :left="{
        image: '/img/hero-arbitraje-publica.webp',
        title: 'Arbitraje en Contrataciones del Estado',
        subtitle: 'Organizamos y gestionamos procesos arbitrales con acceso inmediato a la plataforma virtual IMPERIUM.',
        primary:  { label: 'Solicitar cotización', href: '/contacto#cotizacion' },
        secondary:{ label: 'Iniciar solicitud',   href: '/plataforma' }
      }"
      :right="{
        image: '/img/hero-jprd.webp',
        title: 'Junta de Prevención',
        subtitle: 'y Resolución de Disputas (JPRD)',
        primary: { label: 'Conocer más', href: '/servicios#jprd' }
      }"
    />

    <!-- Envío lo que venga del backend; si está vacío, uso el fallback en español -->
    <ServicesSection :services="props.services.length ? props.services : localServices" />

    <ContactSection />
  </SiteLayout>

  <FloatingWhatsApp />
</template>
