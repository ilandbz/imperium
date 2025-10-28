<!-- resources/js/Pages/NormasLegales.vue -->
<script setup>
import { ref } from 'vue'
import { Head } from '@inertiajs/vue3'
import SiteLayout from '@/Layouts/SiteLayout.vue'

// Puedes traer esto desde el backend. Aquí lo dejo estático como ejemplo.
const grupos = ref([
  {
    titulo: 'Nueva Ley General de Contrataciones Públicas Nº 32069',
    abierto: true,
    items: [
      {
        label: 'Nueva Ley General de Contrataciones Públicas Nº 32069',
        href: '/archivos/normaslegales/Modificacion-Reglamento-de-la-Ley-30225.pdf',
      },
      // {
      //   label: 'Decreto Supremo N° 009-2025-EF. Reglamento de la Ley N° 32069 (22.01.2025)',
      //   href: '/docs/normas/ds-009-2025-ef-reglamento-ley-32069.pdf',
      // },
      // {
      //   label: 'Fe de erratas del Reglamento de la Ley N° 32069 (D.S. N° 009-2025-EF)',
      //   href: '/docs/normas/fe-erratas-ds-009-2025-ef.pdf',
      // },
    ],
  },
  // {
  //   titulo: 'Ley de Contrataciones del Estado N° 30225 – Ley Anterior',
  //   abierto: false,
  //   items: [
  //     { label: 'Texto de la Ley 30225', href: '/docs/normas/ley-30225.pdf' },
  //     { label: 'Reglamento de la Ley 30225', href: '/docs/normas/reglamento-ley-30225.pdf' },
  //   ],
  // },
  // {
  //   titulo: 'Reglamento de la Ley de Contrataciones del Estado – Anterior',
  //   abierto: false,
  //   items: [
  //     { label: 'Reglamento (compilado)', href: '/docs/normas/reglamento-anterior-compilado.pdf' },
  //   ],
  // },
  // {
  //   titulo: 'Ley de Arbitraje',
  //   abierto: false,
  //   items: [
  //     { label: 'Decreto Legislativo N° 1071 – Ley de Arbitraje', href: '/docs/normas/ley-arbitraje-dl-1071.pdf' },
  //   ],
  // },
])

const toggle = (i) => (grupos.value[i].abierto = !grupos.value[i].abierto)
</script>

<template>
  <SiteLayout>
    <Head title="Normas Legales | Corporación Imperium" />

    <!-- Hero (opcional con fondo) -->
    <section
      class="relative h-48 md:h-56 w-full flex items-end"
      style="background-image:url('/img/normaslegales.jpg'); background-size:cover; background-position:center;"
    >
      <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-black/0"></div>
      <div class="relative max-w-7xl mx-auto w-full px-4 pb-6">
        <h1 class="text-3xl md:text-4xl font-extrabold text-white drop-shadow">
          NORMAS LEGALES
        </h1>
      </div>
    </section>

    <!-- Contenido -->
    <section class="py-10 px-4">
      <div class="max-w-5xl mx-auto">

        <!-- Acordeón -->
        <div class="space-y-4">
          <div
            v-for="(g, i) in grupos"
            :key="i"
            class="border rounded-xl overflow-hidden border-primary/30 bg-white"
          >
            <!-- Header -->
            <button
              type="button"
              class="w-full flex items-center justify-between gap-3 px-4 md:px-5 py-3 text-left hover:bg-primary/5"
              @click="toggle(i)"
            >
              <span class="font-semibold text-neutral-900">
                {{ g.titulo }}
              </span>

              <!-- chevron -->
              <svg
                :class="['transition-transform', g.abierto ? 'rotate-180' : 'rotate-0']"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                width="18" height="18" class="fill-primary"
              >
                <path d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/>
              </svg>
            </button>

            <!-- Body -->
            <transition name="acc">
              <div v-show="g.abierto" class="px-4 md:px-5 pb-4">
                <div class="flex flex-col gap-3 pt-2">

                  <a
                    v-for="(it, k) in g.items"
                    :key="k"
                    :href="it.href"
                    target="_blank"
                    rel="noopener"
                    class="inline-flex items-center gap-2 w-fit rounded-full bg-[#0c94af] hover:bg-[#0a8196]
                           text-white text-[15px] font-semibold px-3.5 py-2 transition"
                  >
                    <!-- pdf icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                         width="16" height="16" class="fill-white">
                      <path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM96 232c0-13.3 10.7-24 24-24h40c35.3 0 64 28.7 64 64s-28.7 64-64 64H152v32c0 13.3-10.7 24-24 24s-24-10.7-24-24V232zm48 32v32h16c8.8 0 16-7.2 16-16s-7.2-16-16-16H144z"/>
                    </svg>
                    <span class="whitespace-normal">{{ it.label }}</span>
                  </a>

                </div>
              </div>
            </transition>
          </div>
        </div>

        <!-- Nota -->
        <p class="text-sm text-neutral-500 mt-6">
          * Los documentos se abrirán en una nueva pestaña. Guarda tus PDFs en <code class="bg-neutral-100 px-1 py-0.5 rounded">/public/docs/normas/</code>.
        </p>
      </div>
    </section>
  </SiteLayout>
</template>

<style scoped>
/* animación acordeón simple */
.acc-enter-from, .acc-leave-to { opacity: 0; max-height: 0 }
.acc-enter-active, .acc-leave-active { transition: all .25s ease }
.acc-enter-to, .acc-leave-from { opacity: 1; max-height: 800px }
</style>
