<script setup>
import { ref, onMounted, watch, nextTick } from 'vue'

const props = defineProps({
  // Fondo (por defecto tu azul del footer)
  bgClass: { type: String, default: 'bg-[#071C54]' },
  // Clase de acento (usa tu .text-primary)
  accentClass: { type: String, default: 'text-primary' },
  // Activa conteo animado (0 -> value) al entrar en viewport
  countUp: { type: Boolean, default: true },
  // Métricas a mostrar
  items: {
    type: Array,
    default: () => ([
      { prefix: '+', value: 10,    title: 'Años de',        subtitle: 'Experiencia' },
      { prefix: '',  value: 3,    title: 'Certificaciones', subtitle: 'ISO 9001, ISO 37001 e ISO 27001' },
      { prefix: '+', value: 600,  title: 'Arbitrajes',     subtitle: 'Exitosos' }
    ])
  }
})

const el = ref(null)
const displayValues = ref(props.items.map(i => 0))

function animateCount(index, to, duration = 1200) {
  const start = performance.now()
  const from = 0
  function step(t) {
    const p = Math.min(1, (t - start) / duration)
    displayValues.value[index] = Math.floor(from + (to - from) * p)
    if (p < 1) requestAnimationFrame(step)
  }
  requestAnimationFrame(step)
}

onMounted(async () => {
  await nextTick()
  if (!props.countUp) {
    displayValues.value = props.items.map(i => i.value)
    return
  }
  const io = new IntersectionObserver((entries) => {
    if (entries.some(e => e.isIntersecting)) {
      props.items.forEach((it, idx) => animateCount(idx, Number(it.value) || 0))
      io.disconnect()
    }
  }, { threshold: 0.2 })
  if (el.value) io.observe(el.value)
})

// Si cambian los items, actualiza el conteo
watch(() => props.items, (nv) => {
  displayValues.value = nv.map(i => props.countUp ? 0 : i.value)
}, { deep: true })
</script>

<template>
  <section :class="[bgClass, 'py-12 px-4']" ref="el">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-6 text-center">
      <div v-for="(it, i) in items" :key="i" class="flex flex-col justify-center items-center">
        <span class="text-5xl md:text-6xl text-white font-bold flex items-center">
          <span :class="[accentClass, 'text-6xl mr-1']" v-if="it.prefix">{{ it.prefix }}</span>
          {{ displayValues[i] }}
        </span>
        <p class="text-white text-lg md:text-2xl font-semibold leading-tight">
          {{ it.title }} <br>
          <span class="text-white font-medium">{{ it.subtitle }}</span>
        </p>
      </div>
    </div>
  </section>
</template>
