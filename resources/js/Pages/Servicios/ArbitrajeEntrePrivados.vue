<script setup>
import { ref } from 'vue'
import { Head } from '@inertiajs/vue3'
import SiteLayout from '@/Layouts/SiteLayout.vue'

const openIndex = ref(0)

// 📂 ESTRUCTURA DE "arbitraje-entre-privados"
const sections = [
  {
    title: 'Presenta tu solicitud de Arbitraje entre Privados',
    description:
      'Formatos editables para preparar la solicitud, respuesta y documentación correspondiente.',
    items: [
      {
        label: 'Debida Diligencia — Demandante o Demandado (Privado)',
        href: '/archivos/servicios/arbitraje-entre-privados/presenta-tu-solicitud-de-arbitraje/debida-diligencia-para-sn---demandante-o-demandado-privado-f-002-ddp.docx',
        type: 'DOCX',
      },
      {
        label: 'Solicitud de Inicio de Procedimiento Arbitral (Privados)',
        href: '/archivos/servicios/arbitraje-entre-privados/presenta-tu-solicitud-de-arbitraje/solicitud-de-inicio-de-procedimiento-arbitral-privados-f-001-sipap.docx',
        type: 'DOCX',
      },
      {
        label: 'Respuesta a Solicitud de Inicio de Procedimiento Arbitral',
        href: '/archivos/servicios/arbitraje-entre-privados/presenta-tu-solicitud-de-arbitraje/respuesta-a-solicitud-de-inicio-de-procedimiento-arbitral-privado.docx',
        type: 'DOCX',
      },
    ],
  },

  {
    title: 'Reglamentos',
    description: 'Normativa del Centro aplicable al arbitraje entre privados.',
    items: [
      {
        label: 'Código de Ética — Corporación Imperium',
        href: '/archivos/servicios/arbitraje-entre-privados/reglamento/codigo-de-etica-corporacion-imperium.pdf',
        type: 'PDF',
      },
      {
        label: 'Estatuto del Centro',
        href: '/archivos/servicios/arbitraje-entre-privados/reglamento/estatuto-del-centro-.pdf',
        type: 'PDF',
      },
      {
        label: 'Nómina de Árbitros',
        href: '/archivos/servicios/arbitraje-entre-privados/reglamento/nomina-de-arbitros.pdf',
        type: 'PDF',
      },
      {
        label: 'Reglamento de Costos Arbitrales',
        href: '/archivos/servicios/arbitraje-entre-privados/reglamento/reglamento-de-costos-arbitrales-corporacion-imperium.pdf',
        type: 'PDF',
      },
      {
        label: 'Reglamento Interno — Corporación Imperium',
        href: '/archivos/servicios/arbitraje-entre-privados/reglamento/reglamento-interno-corporacion-imperium.pdf',
        type: 'PDF',
      },
      {
        label: 'Cláusula Arbitral — Modelo',
        href: '/archivos/servicios/arbitraje-entre-privados/reglamento/clausula-arbitral-centro.docx',
        type: 'DOCX',
      },
    ],
  },
]

const toggle = (idx) => {
  openIndex.value = openIndex.value === idx ? -1 : idx
}
</script>

<template>
  <SiteLayout>
    <Head title="Arbitraje entre Privados | Corporación Imperium" />

    <!-- HEADER -->
    <section
      class="relative w-full py-10 md:py-14 text-white"
      style="background-image:url('/img/arbitraje-entre-privados.webp');background-size:cover;background-position:center"
    >
      <div class="absolute inset-0 bg-gradient-to-r from-[#071C54]/90 via-[#071C54]/80 to-[#071C54]/40" />

      <div class="relative max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-8 items-center">
        <div class="space-y-4 md:space-y-5">
          <p class="text-sm uppercase tracking-[0.25em] text-white/80">
            Arbitraje entre Privados
          </p>

          <h1 class="text-3xl md:text-4xl font-extrabold text-white/90 max-w-xl">
            ARBITRAJE ENTRE PRIVADOS
          </h1>

          <p class="text-sm md:text-base text-white/90 max-w-xl">
            Las partes pueden resolver cualquier controversia privada mediante arbitraje. El
            procedimiento se rige por normas sustantivas y procesales del Centro.
          </p>

          <a
            href="/plataforma"
            class="inline-flex items-center justify-center rounded-full bg-white text-primary px-6 py-2.5 font-semibold text-sm hover:bg-white/90 shadow-md"
          >
            INGRESAR AQUÍ
          </a>
        </div>

        <div class="hidden md:flex justify-end">
          <div class="bg-white/95 rounded-2xl shadow-xl overflow-hidden max-w-sm w-full border border-white/40">
            <img src="/img/banner-arbitraje-publica.webp"
                 class="w-full h-52 object-cover" />
            <div class="p-4 text-sm text-neutral-700">
              <p class="font-semibold text-primary mb-1">
                ¿Cómo presentar tu solicitud?
              </p>
              <p>
                Descarga los formatos, revisa los reglamentos y presenta tu solicitud según los lineamientos del Centro.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CONTENIDO -->
    <section class="py-10 px-4 bg-gray-50">
      <div class="max-w-7xl mx-auto grid lg:grid-cols-[minmax(0,2fr)_minmax(260px,1fr)] gap-10">

        <!-- Acordeón -->
        <div class="space-y-3">
          <div v-for="(section, idx) in sections" :key="section.title"
               class="border border-neutral-200 rounded-xl bg-white overflow-hidden">

            <!-- header -->
            <button class="w-full flex items-center justify-between px-4 md:px-5 py-3.5 text-left hover:bg-neutral-50"
                    @click="toggle(idx)">
              <div>
                <p class="text-sm md:text-base font-semibold text-neutral-900">
                  {{ section.title }}
                </p>
                <p class="text-xs md:text-sm text-neutral-500 mt-0.5">
                  {{ section.description }}
                </p>
              </div>

              <span class="ml-4 inline-flex h-7 w-7 items-center justify-center rounded-full border border-primary text-primary text-xs">
                <svg v-if="openIndex!==idx" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-3 w-3" fill="currentColor">
                  <path d="M240 80c0-8.8-7.2-16-16-16s-16 7.2-16 16V240H48c-8.8 
                           0-16 7.2-16 16s7.2 16 16 16H208V432c0 8.8 7.2 16 16 
                           16s16-7.2 16-16V272H400c8.8 0 16-7.2 16-16s-7.2-16-16-16z"/>
                </svg>
                <svg v-else xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-3 w-3" fill="currentColor">
                  <path d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 
                           0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 
                           14.3 32 32z"/>
                </svg>
              </span>
            </button>

            <!-- body -->
            <transition name="accordion">
              <div v-show="openIndex===idx" class="border-t border-neutral-200">
                <ul class="divide-y divide-neutral-100">
                  <li v-for="item in section.items" :key="item.label"
                      class="flex items-center justify-between px-4 md:px-5 py-3 text-sm">

                    <div class="flex items-center gap-2">
                      <span class="inline-flex h-7 w-7 items-center justify-center rounded-md bg-primary/10 text-primary">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 384 512"
                          class="h-4 w-4"
                          fill="currentColor"
                        >
                          <path
                            d="M224 136V0H64C28.7 0 0 28.7 0 64V448c0 35.3 
                               28.7 64 64 64H320c35.3 0 64-28.7 
                               64-64V160H248C234.7 160 224 149.3 224 136zM384 
                               121.9V128H256V0h6.1c12.7 0 24.9 5.1 
                               33.9 14.1L369.9 88c9 9 14.1 21.2 14.1 
                               33.9z"
                          />
                        </svg>
                      </span>
                      <span class="text-neutral-800">{{ item.label }}</span>
                    </div>

                    <div class="flex items-center gap-2">
                      <span class="text-[11px] font-semibold px-2 py-0.5 rounded-full border border-primary/50 text-primary/80">
                        {{ item.type }}
                      </span>

                      <a :href="item.href" target="_blank"
                         class="inline-flex h-8 w-8 items-center justify-center rounded-full text-primary hover:bg-primary/10">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 512 512"
                          class="h-4 w-4"
                          fill="currentColor"
                        >
                          <path
                            d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 
                               32V274.7L150.6 201.4c-12.5-12.5-32.8-12.5-45.3 
                               0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 
                               12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 
                               0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 
                               352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 
                               64 64 64H448c35.3 0 64-28.7 
                               64-64V416c0-35.3-28.7-64-64-64H352v64H448v32H64V416H160V352H64z"
                          />
                        </svg>
                      </a>
                    </div>
                  </li>
                </ul>
              </div>
            </transition>

          </div>
        </div>

        <!-- Sidebar -->
        <aside class="space-y-4">
          <div class="bg-white rounded-xl shadow-sm border border-neutral-200 p-5 text-sm">
            <h3 class="text-base font-semibold text-primary mb-2">
              Resolución de controversias privadas
            </h3>
            <p class="text-neutral-700 leading-relaxed">
              Ideal para disputas civiles, comerciales o contractuales entre particulares.
            </p>
          </div>

          <div class="bg-[#071C54] text-white rounded-xl p-5 text-sm space-y-2">
            <p class="text-xs font-semibold tracking-[0.15em] uppercase text-white/70">
              ¿Quieres ser árbitro del Centro?
            </p>
            <p class="text-sm">
              Revisa los requisitos para unirte a la nómina de árbitros especializados.
            </p>

            <a href="/archivos/servicios/arbitraje-entre-privados/reglamento/nomina-de-arbitros.pdf"
               target="_blank"
               class="inline-flex mt-2 items-center justify-center rounded-full bg-white text-primary px-4 py-2 text-xs font-semibold hover:bg-white/90">
              REVISAR REQUISITOS
            </a>
          </div>
        </aside>

      </div>
    </section>
  </SiteLayout>
</template>

<style scoped>
.accordion-enter-active,
.accordion-leave-active {
  transition: all 0.18s ease-out;
}
.accordion-enter-from,
.accordion-leave-to {
  opacity: 0;
  max-height: 0;
}
</style>
