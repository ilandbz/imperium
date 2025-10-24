<!-- resources/js/Pages/Home.vue -->
<script setup>
import SiteLayout from '@/Layouts/SiteLayout.vue'
import HeroSplit from '@/Components/HeroSplit.vue'
import ServicesSection from '@/Components/ServicesSection.vue'
import ContactSection from '@/Components/ContactSection.vue'
import FloatingWhatsApp from '@/Components/FloatingWhatsApp.vue'
import MetricsSection from '@/Components/MetricsSection.vue'
import ArbitrationCalculatorSection from '@/Components/ArbitrationCalculatorSection.vue'
import CommitmentSection from '@/Components/CommitmentSection.vue'


const props = defineProps({
  services: { type: Array, default: () => [] }
})

// Fallback local si el backend no manda nada (tu mismo patrón)
const localServices = [
  {
    title: 'Arbitraje en Contratación Pública',
    href : '/arbitraje-en-contratacion-publica',
    image: 'img/arbitraje-en-contratacin-pblica.webp'
  },
  {
    title: 'Arbitraje de Emergencia',
    href : '/arbitraje-de-emergencia',
    image: 'img/arbitraje-de-emergencia.webp'
  },
  {
    title: 'Arbitraje entre privados',
    href : '/arbitraje-entre-privados',
    image: 'img/arbitraje-entre-privados.webp'
  },
  {
    title: 'Junta de Prevención y Resolución de Disputas',
    href : '/junta-de-resolucion-de-disputas',
    image: 'img/jprd.webp'
  },
  {
    title: 'Recusación',
    href : '/recusacion',
    image: 'img/recusacion.webp'
  },
  {
    title: 'Peritaje en sus diversas especialidades',
    href : '/peritaje',
    image: 'img/peritaje-en-sus-diversas.webp'
  },
  {
    title: 'Designación Residual de Árbitro Ad Hoc',
    href : '/designacion-residual-arbitro',
    image: 'img/designacion-residual-arbitro.webp'
  },
  {
    title: 'Instalación de Árbitro Único o Tribunal Arbitral',
    href : '/instalacion-arbitral',
    image: 'img/instalacion-arbitral.webp'
  }
]

const calcStrategy = (montoPen, { igv, mode }) => {
  // EJEMPLO: cambia según tus tablas reales
  // puedes leer "mode" para usar otra tabla en emergencia
  let admin, arbitrator

  if (montoPen <= 50000) {
    admin = 0.02 * montoPen
    arbitrator = 0.034 * montoPen
  } else if (montoPen <= 200000) {
    admin = 1000 + 0.015 * (montoPen - 50000)
    arbitrator = 1700 + 0.02 * (montoPen - 50000)
  } else {
    admin = 3250 + 0.01 * (montoPen - 200000)
    arbitrator = 4700 + 0.015 * (montoPen - 200000)
  }

  // si mode === 'emergencia' podrías aplicar un factor diferente:
  if (mode === 'emergencia') {
    admin *= 1.0
    arbitrator *= 1.0
  }

  return { admin, arbitrator }
}

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
    <CommitmentSection />
    <ServicesSection :services="props.services.length ? props.services : localServices" />

    <MetricsSection
      bg-class="bg-[#071C54]"
      accent-class="text-primary"
      :count-up="true"
    />



  <ArbitrationCalculatorSection
    :sunat-rate="3.378"
    :igv="0.18"
    :calc-strategy="calcStrategy"
  />

    
    <ContactSection />


  </SiteLayout>

  <FloatingWhatsApp />
</template>
