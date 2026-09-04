<script setup>
import { ref } from 'vue'
import HoverFillCard from '@/Components/HoverFillCard.vue'

const peritos = [
  {
    id: 'perito-1',
    nombre: 'ABOG. HEIDI IVONNE TORRES SANTOS DE KULESZA',
    cargo: 'PERITO ESPECIALISTA EN GRAFOTECNICO Y DACTILOSCOPICO FORENSE',
    pais: 'pe',
    cv: ''
  },
  {
    id: 'perito-2',
    nombre: 'ABOG. ARMANDO HUARANGA BASHUALDO',
    cargo: 'PERITO ESPECIALISTA EN GRAFOTECNICO Y DACTILOSCOPICO FORENSE',
    pais: 'pe',
    cv: ''
  },
  {
    id: 'perito-3',
    nombre: 'ABOG. ARMANDO HUARANGA BASHUALDO',
    cargo: 'PERITO ESPECIALISTA EN ACCIDENTOLOGIA VIAL FORENSE',
    pais: 'pe',
    cv: ''
  },
  {
    id: 'perito-4',
    nombre: 'ABOG. ARMANDO HUARANGA BASHUALDO',
    cargo: 'PERITO ESPECIALISTA EN DOCUMENTALOSCOPIA FORENSE',
    pais: 'pe',
    cv: ''
  },
  {
    id: 'perito-5',
    nombre: 'ABOG. ARMANDO HUARANGA BASHUALDO',
    cargo: 'PERITO ESPECIALISTA EN BIOMETRIA FORENSE',
    pais: 'pe',
    cv: ''
  },
  {
    id: 'perito-6',
    nombre: 'ABOG. ARMANDO HUARANGA BASHUALDO',
    cargo: 'PERITO ESPECIALISTA EN ESCENAS DEL CRIMEN',
    pais: 'pe',
    cv: ''
  },
  {
    id: 'perito-7',
    nombre: 'ABOG. ARMANDO HUARANGA BASHUALDO',
    cargo: 'PERITO ESPECIALISTA EN ACUSTICA Y AUDIOLOGIA FORENSE',
    pais: 'pe',
    cv: ''
  },
  {
    id: 'perito-8',
    nombre: 'ABOG. ARMANDO HUARANGA BASHUALDO',
    cargo: 'PERITO ESPECIALISTA EN TOPOGRAFIA FORENSE',
    pais: 'pe',
    cv: ''
  },
  {
    id: 'perito-9',
    nombre: 'ABOG. ARMANDO HUARANGA BASHUALDO',
    cargo: 'PERITO ESPECIALISTA EN CAMARA GESSELL PARA CASOS CONTRA LA LIBERTAD SEXUAL',
    pais: 'pe',
    cv: ''
  },
  {
    id: 'perito-10',
    nombre: 'MANUEL MALPARTIDA GOMEZ',
    cargo: 'PERITO ESPECIALISTA EN MECANICA FORENSE',
    pais: 'pe',
    cv: ''
  },
  {
    id: 'perito-11',
    nombre: 'C.P.C. BONNIE VERONICA CAQUI CHAUPIS',
    cargo: 'PERITO ESPECIALISTA EN CONTABILIDAD',
    pais: 'pe',
    cv: ''
  }
]

const abrirCV = (persona) => {
  if (!persona.cv) return
  const url = /^https?:\/\//i.test(persona.cv)
    ? persona.cv
    : `/storage/cv2/${persona.cv}`
  window.open(url, '_blank')
}

const flagSrc = () => `/img/flags/pe.jpg`
</script>

<template>
    <section class="relative">
      <div class="absolute inset-0">
        <img src="/img/legalidad.jpg" alt="" class="w-full h-full object-cover" />
        <div class="absolute inset-0 bg-primary/60"></div>
      </div>
      <div class="relative max-w-6xl mx-auto px-4 py-20 md:py-28">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight">
          NÓMINA DE PERITOS ESPECIALIZADOS
        </h1>
      </div>
    </section>

    <section class="py-12 px-6 bg-gray-50 text-center">
      <div class="max-w-3xl mx-auto">
        <h3 class="text-3xl font-bold text-primary mb-4">NÓMINA DE PERITOS ESPECIALIZADOS</h3>
        <p class="text-neutral-700 leading-relaxed text-lg">Nuestra Nómina de Peritos está conformada por:</p>
      </div>
    </section>

    <section class="py-10 px-4">
      <div class="max-w-6xl mx-auto flex flex-col gap-12">
        <div class="text-center space-y-2">
          <h4 class="text-2xl font-bold text-primary">
            PERITOS ESPECIALISTAS
          </h4>
          <p class="text-sm uppercase tracking-wide text-neutral-600">
            Peritaje en sus diversas especialidades
          </p>
        </div>

        <div class="space-y-6">
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 place-items-center">
            <button
              v-for="p in peritos"
              :key="p.id"
              type="button"
              class="block w-full max-w-[420px] text-left"
              @click="abrirCV(p)"
            >
              <HoverFillCard :clickable="true" fillColor="bg-primary" containerClass="h-full">
                <div class="flex items-start gap-4 text-slate-900 transition-colors duration-500 group-hover:text-white">
                  <div class="flex-1 pr-8">
                    <h3 class="text-xl font-extrabold leading-tight transition-colors duration-500 group-hover:text-white">{{ p.nombre }}</h3>
                    <p class="mt-1 text-sm font-semibold tracking-wide uppercase transition-colors duration-500 group-hover:text-white">{{ p.cargo }}</p>
                    <div class="mt-4 text-base transition-colors duration-500 group-hover:text-white">
                      <span class="font-semibold">País: </span>
                      <img :src="flagSrc()" alt="País" class="inline-block h-5 align-[-2px]" />
                    </div>
                  </div>
                  <div class="h-10 w-10 rounded-lg bg-primary text-white grid place-items-center transition-colors group-hover:bg-white group-hover:text-primary">
                    <span class="text-lg font-bold">›</span>
                  </div>
                </div>
              </HoverFillCard>
            </button>
          </div>
        </div>
      </div>
    </section>
</template>

<style scoped>
.fade-enter-active,.fade-leave-active{transition:opacity .2s}
.fade-enter-from,.fade-leave-to{opacity:0}
</style>
