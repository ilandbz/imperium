<script setup>
import { ref, computed } from 'vue'
import { Head } from '@inertiajs/vue3'
import SiteLayout from '@/Layouts/SiteLayout.vue'
import HoverFillCard from '@/Components/HoverFillCard.vue'

const consejoSuperior = [
  {
    id: 'dir-1',
    nombre: 'ABOG. HEIDI TORRES SANTOS de KULESZA',
    cargo: 'Especialista en Derecho Administrativo, Contrataciones con el Estado y Arbitraje',
    pais: 'pe',
    cv: 'heidi.pdf'
  },
  {
    id: 'cs-1',
    nombre: 'ING. CIVIL CRISTHIAN RONALDO ASCENCIO MAGARIÑO',
    cargo: '',
    pais: 'pe',
    cv: 'cristhianascencio.pdf'
  },
  {
    id: 'cs-2',
    nombre: 'ING. CIVIL JUAN CARLOS GARCIA DURAND',
    cargo: '',
    pais: 'pe',
    cv: 'juanca.pdf'
  },
  {
    id: 'cs-3',
    nombre: 'ING. CIVIL VICTOR ALESSANDRO INGOL LOZANO',
    cargo: '',
    pais: 'pe',
    cv: 'victor.pdf'
  },
  {
    id: 'og-1',
    nombre: 'ING. CIVIL SHERLY SUCI MORALES VILLANUEVA',
    cargo: '',
    pais: 'pe',
    cv: 'sherly.pdf'
  },
  {
    id: 'og-2',
    nombre: 'ING. CIVIL WILHELM EDWARD NIETO SIXTO',
    cargo: '',
    pais: 'pe',
    cv: 'wilhelm.pdf'
  },
  {
    id: 'og-3',
    nombre: 'ING. CIVIL ALEX SANTOS ONEGLIO',
    cargo: '',
    pais: 'pe',
    cv: 'alexsantos.pdf'
  },

]


const principal = computed(() =>
  consejoSuperior.find(p => p.id === 'dir-1')
)

const secundarios = computed(() =>
  consejoSuperior.filter(p => p.id !== 'dir-1')
)


const abrirCV = (persona) => {
  if (!persona.cv) return

  const url = `/storage/cv2/${persona.cv}`
  window.open(url, '_blank')
}


const flagSrc = () => `/img/flags/pe.jpg`

const detalleAbierto = ref(false)
const personaSel = ref(null)
const abrirDetalle = (p) => { personaSel.value = p; detalleAbierto.value = true }
const cerrarDetalle = () => { detalleAbierto.value = false; personaSel.value = null }
</script>

<template>
  <SiteLayout>
    <Head title="Nominas de Arbitros | Corporación Imperium" />

    <section class="relative">
      <div class="absolute inset-0">
        <img src="/img/legalidad.jpg" alt="" class="w-full h-full object-cover" />
        <div class="absolute inset-0 bg-primary/60"></div>
      </div>
      <div class="relative max-w-6xl mx-auto px-4 py-20 md:py-28">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight">
          COORDINADOR Y ADMINISTRADOR DE LA JPRD
        </h1>
      </div>
    </section>

    <nav class="bg-white" aria-label="breadcrumb">
      <div class="max-w-6xl mx-auto px-4 py-3 text-primary flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" class="fill-current"><path d="M12.293 5.293a1 1 0 011.414 1.414L10.414 10l3.293 3.293a1 1 0 01-1.414 1.414L8.586 10l3.707-4.707z"/></svg>
          <section class="py-12 px-6 bg-gray-50 text-center">
            <div class="max-w-3xl mx-auto">
              <h3 class="text-3xl font-bold text-primary mb-4">
                COORDINADOR Y ADMINISTRADOR DE LA JPRD
              </h3>
              <p class="text-neutral-700 leading-relaxed text-lg">
                Responsable de la coordinación y administración de la JPRD
              </p>
            </div>
          </section>
      </div>
    </nav>

    <section class="py-12 px-6 bg-gray-50 text-center">
      <div class="max-w-3xl mx-auto">
        <h3 class="text-3xl font-bold text-primary mb-4">COORDINADOR Y ADMINISTRADOR DE LA JPRD/ADJUDICADORES PARA LA JPRD</h3>
        <p class="text-neutral-700 leading-relaxed text-lg">Nuestra Nominas de Arbitros esta conformado por</p>
      </div>
    </section>

    <section class="py-10 px-4">
      <div class="max-w-6xl mx-auto flex flex-col gap-12">
        <div class="space-y-6">
          <h4 class="text-xl font-bold text-primary text-center">COORDINADOR Y ADMINISTRADOR DE LA JPRD/ADJUDICADORES PARA LA JPRD</h4>
            <div class="grid place-items-center">
            <button
                v-if="principal"
                type="button"
                class="block w-full max-w-[520px]"
                @click="abrirCV(principal)"
            >
                <HoverFillCard
                :clickable="true"
                fillColor="bg-primary"
                containerClass="h-full border-4 border-primary/30"
                >
                <div class="text-center transition-colors duration-500 group-hover:text-white">
                    <h3 class="text-2xl font-extrabold leading-tight">
                    {{ principal.nombre }}
                    </h3>
                    <p class="mt-2 text-sm font-semibold uppercase">
                    {{ principal.cargo }}
                    </p>

                    <div class="mt-4 flex justify-center items-center gap-2">
                    <span class="font-semibold">País:</span>
                    <img :src="flagSrc()" alt="País" class="h-5" />
                    </div>
                </div>
                </HoverFillCard>
            </button>
            </div>
        </div>
<div class="text-center space-y-2">
  <h4 class="text-2xl font-bold text-primary">
    ADJUDICADORES PARA LA JPRD
  </h4>
  <p class="text-sm uppercase tracking-wide text-neutral-600">
    Para contrataciones del Estado
  </p>
</div>
        <div class="space-y-6">
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 place-items-center">
            <button
              v-for="p in consejoSuperior"
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

    <transition name="fade">
      <div
        v-if="detalleAbierto && personaSel"
        class="fixed inset-0 z-50 flex items-center justify-center"
        @keydown.esc="cerrarDetalle"
      >
        <div class="absolute inset-0 bg-black/50" @click="cerrarDetalle"></div>
        <div class="relative bg-white rounded-2xl shadow-xl w-full max-w-xl mx-4 overflow-hidden">
          <div class="bg-primary text-white px-6 py-4 flex items-center justify-between">
            <h3 class="text-lg font-bold">{{ personaSel.nombre }}</h3>
            <button type="button" class="rounded-md px-3 py-1.5 bg-white/20 hover:bg-white/30" @click="cerrarDetalle">✕</button>
          </div>
          <div class="p-6">
            <p class="text-sm uppercase font-semibold text-primary mb-2">{{ personaSel.cargo }}</p>
            <div class="flex items-center gap-2 mb-6">
              <span class="font-semibold">País:</span>
              <img :src="flagSrc()" alt="País" class="h-5" />
            </div>
            <div class="prose max-w-none">
              <p><strong>Nombre completo:</strong> {{ personaSel.nombre }}</p>
              <p><strong>Cargo:</strong> {{ personaSel.cargo }}</p>
              <p><strong>Grupo:</strong> {{
                direccion.some(d=>d.id===personaSel.id) ? 'Órgano de Dirección' :
                consejoSuperior.some(c=>c.id===personaSel.id) ? 'Consejo Superior' :
                'Órgano de Gestión'
              }}</p>
            </div>
          </div>
          <div class="px-6 py-4 bg-gray-50 flex justify-end">
            <button type="button" class="px-4 py-2 rounded-lg bg-primary text-white hover:bg-primary/90" @click="cerrarDetalle">Cerrar</button>
          </div>
        </div>
      </div>
    </transition>
  </SiteLayout>
</template>

<style scoped>
.fade-enter-active,.fade-leave-active{transition:opacity .2s}
.fade-enter-from,.fade-leave-to{opacity:0}
</style>
