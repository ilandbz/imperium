<script setup>
import { ref } from 'vue'
import { Head, Link  } from '@inertiajs/vue3'
import SiteLayout from '@/Layouts/SiteLayout.vue'

const openIndex = ref(0) // primer bloque abierto

const sections = [
  {
    title: 'Presenta tu solicitud de Arbitraje en Contratación Pública',
    description:
      'Formatos editables para preparar la solicitud, respuesta y tasas administrativas.',
    items: [
      {
        label: 'Debida Diligencia para SN – Demandante',
        href: '/archivos/servicios/arbitraje-en-contrataciones-publicas/presenta-tu-solicitud-de-arbitraje-en-contratacion-publica/debida-diligencia-para-sn-demandante-o-demandado-privado-f-003-ddp.docx',
        type: 'DOCX',
      },
      {
        label: 'Debida Diligencia para SN – Demandado',
        href: '/archivos/servicios/arbitraje-en-contrataciones-publicas/presenta-tu-solicitud-de-arbitraje-en-contratacion-publica/debida-diligencia-para-sn-demandante-o-demandado-publico-f-002-ddp.docx',
        type: 'DOCX',
      },
      {
        label: 'Solicitud de Inicio de Procedimiento Arbitral',
        href: '/archivos/servicios/arbitraje-en-contrataciones-publicas/presenta-tu-solicitud-de-arbitraje-en-contratacion-publica/solicitud-de-inicio-de-procedimiento-arbital-publico-f-001-sipap.docx',
        type: 'DOCX',
      },
      {
        label: 'Respuesta a la Solicitud de Inicio de Procedimiento Arbitral',
        href: '/archivos/servicios/arbitraje-en-contrataciones-publicas/presenta-tu-solicitud-de-arbitraje-en-contratacion-publica/respuesta-a-la-solicitud-de-inicio-de-procedimiento-arbitral-f-004-pa.docx',
        type: 'DOCX',
      },
      // {
      //   label: 'Tasas Administrativas',
      //   href: '/archivos/servicios/arbitraje-en-contrataciones-publicas/presenta-tu-solicitud-de-arbitraje-en-contratacion-publica/tasas-administrativas.docx',
      //   type: 'DOCX',
      // },
    ],
  },
  {
    title: 'Reglamentos',
    description:
      'Marco normativo aplicable al servicio de Arbitraje en Contratación Pública.',
    items: [
      {
        label: 'Código de Ética – Corporación Imperium',
        href: '/archivos/servicios/arbitraje-en-contrataciones-publicas/reglamento/codigo-de-etica-corporacion-imperium.pdf',
        type: 'PDF',
      },
      {
        label: 'Estatuto del Centro',
        href: '/archivos/servicios/arbitraje-en-contrataciones-publicas/reglamento/estatuto-del-centro.pdf',
        type: 'PDF',
      },
      {
        label: 'Nómina de Árbitros',
        href: '/institucional/NominaArbitros',
        type: 'URL',
      },
      {
        label: 'Reglamento de Costos Arbitrales',
        href: '/archivos/servicios/arbitraje-en-contrataciones-publicas/reglamento/reglamento-de-costos-arbitrales-corporacion-imperium.pdf',
        type: 'PDF',
      },
      {
        label: 'Reglamento Interno – Corporación Imperium',
        href: '/archivos/servicios/arbitraje-en-contrataciones-publicas/reglamento/reglamento-interno-corporacion-imperium.pdf',
        type: 'PDF',
      },
      {
        label: 'Cláusula Arbitral – Modelo',
        href: '/archivos/servicios/arbitraje-en-contrataciones-publicas/reglamento/clausula-arbitral-centro.docx',
        type: 'DOCX',
      },
      {
        label: 'Documento de Aprobación del Reglamento Interno y código de ética',
        href: '/archivos/servicios/arbitraje-en-contrataciones-publicas/reglamento/b2.pdf',
        type: 'PDF',
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
    <Head title="Arbitraje en Contratación Pública | Corporación Imperium" />

    <section
      class="relative w-full py-10 md:py-14 text-white"
      style="background-image:url('/img/hero-arbitraje-publica.webp');background-size:cover;background-position:center"
    >
      <div class="absolute inset-0 bg-gradient-to-r from-[#071C54]/90 via-[#071C54]/80 to-[#071C54]/40" />
      <div class="relative max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-8 items-center">
        <div class="space-y-4 md:space-y-5">
            <p class="text-sm uppercase tracking-[0.25em] text-white opacity-80">
            Arbitraje en contratación pública
            </p>
          <h1 class="text-3xl md:text-4xl font-extrabold text-white/90 max-w-xl">
            ARBITRAJE EN CONTRATACIONES DEL ESTADO
          </h1>
          <p class="text-sm md:text-base text-white/90 max-w-xl">
            Este servicio es aplicable frente a las controversias que surjan entre las partes
            relacionadas con la ejecución, resolución o invalidez de los contratos de obras, bienes
            y servicios. La tramitación se rige por la Ley de Contrataciones del Estado, su
            Reglamento y el Reglamento Procesal de Arbitraje del Centro.
          </p>

          <div class="pt-2 flex flex-wrap gap-3">
            <a
              href="/plataforma"
              class="inline-flex items-center justify-center rounded-full bg-white text-primary px-6 py-2.5 font-semibold text-sm hover:bg-white/90 shadow-md"
            >
              INGRESAR AQUÍ
            </a>
          </div>

          <p class="text-xs md:text-sm text-white/90">
            <span class="font-bold">NOTA:</span>
            Si ya eres cliente, puedes gestionar tu solicitud directamente a través de la
            plataforma virtual.
          </p>
        </div>

        <!-- Panel derecho (imagen / banner / video) -->
        <div class="hidden md:flex justify-end">
          <div
            class="bg-white/95 rounded-2xl shadow-xl overflow-hidden max-w-sm w-full border border-white/40"
          >
            <img
              src="/img/banner-arbitraje-publica.webp"
              alt="Cómo ingresar tu solicitud"
              class="w-full h-52 object-cover"
            />
            <div class="p-4 text-sm text-neutral-700">
              <p class="font-semibold text-primary mb-1">
                ¿Cómo presentar tu solicitud de arbitraje?
              </p>
              <p>
                Descarga los formatos, revisa el reglamento y presenta tu solicitud a través de
                nuestros canales autorizados.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CUERPO PRINCIPAL -->
    <section class="py-10 px-4 bg-gray-50">
      <div class="max-w-7xl mx-auto grid lg:grid-cols-[minmax(0,2fr)_minmax(260px,1fr)] gap-10">
        <!-- Acordeón -->
        <div class="space-y-3">
          <div
            v-for="(section, idx) in sections"
            :key="section.title"
            class="border border-neutral-200 rounded-xl bg-white overflow-hidden"
          >
            <!-- header -->
            <button
              type="button"
              class="w-full flex items-center justify-between px-4 md:px-5 py-3.5 text-left hover:bg-neutral-50"
              @click="toggle(idx)"
            >
              <div>
                <p class="text-sm md:text-base font-semibold text-neutral-900">
                  {{ section.title }}
                </p>
                <p class="text-xs md:text-sm text-neutral-500 mt-0.5">
                  {{ section.description }}
                </p>
              </div>

              <span
                class="ml-4 inline-flex h-7 w-7 items-center justify-center rounded-full border border-primary text-primary text-xs"
              >
                <svg
                  v-if="openIndex !== idx"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 448 512"
                  class="h-3 w-3"
                  fill="currentColor"
                >
                  <path
                    d="M240 80c0-8.8-7.2-16-16-16s-16 7.2-16 16V240H48c-8.8 
                       0-16 7.2-16 16s7.2 16 16 16H208V432c0 8.8 7.2 16 16 
                       16s16-7.2 16-16V272H400c8.8 0 16-7.2 16-16s-7.2-16-16-16H240z"
                  />
                </svg>
                <svg
                  v-else
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 448 512"
                  class="h-3 w-3"
                  fill="currentColor"
                >
                  <path
                    d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 
                       0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 
                       14.3 32 32z"
                  />
                </svg>
              </span>
            </button>

            <!-- body -->
            <transition name="accordion">
              <div v-show="openIndex === idx" class="border-t border-neutral-200">
                <ul class="divide-y divide-neutral-100">
                  <li
                    v-for="item in section.items"
                    :key="item.label"
                    class="flex items-center justify-between px-4 md:px-5 py-3 text-sm"
                  >
                    <div class="flex items-center gap-2">
                      <!-- icon archivo -->
                      <span
                        class="inline-flex h-7 w-7 items-center justify-center rounded-md bg-primary/10 text-primary"
                      >
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
                      <span class="text-neutral-800">
                        {{ item.label }}
                      </span>
                    </div>

                    <div class="flex items-center gap-2">
                      <span
                        class="text-[11px] font-semibold px-2 py-0.5 rounded-full border border-primary/50 text-primary/80"
                      >
                        {{ item.type }}
                      </span>

 <template v-if="item.type === 'URL'">
    <Link
      :href="item.href"
      class="inline-flex h-8 w-8 items-center justify-center rounded-full text-primary hover:bg-primary/10"
      title="Ver página"
    >
      <!-- icon -->
      <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 512 512"
        class="h-4 w-4"
        fill="currentColor"
      >
        <path
          d="M320 0H96C60.7 0 32 28.7 32 64v384c0 35.3 
             28.7 64 64 64h320c35.3 0 64-28.7 
             64-64V160L320 0z"
        />
      </svg>
    </Link>
  </template>

  <!-- ARCHIVO (PDF / DOCX) -->
  <template v-else>
    <a
      :href="item.href"
      target="_blank"
      rel="noopener"
      class="inline-flex h-8 w-8 items-center justify-center rounded-full text-primary hover:bg-primary/10"
      :title="`Abrir ${item.type}`"
    >
      <!-- icon -->
      <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 512 512"
        class="h-4 w-4"
        fill="currentColor"
      >
        <path
          d="M288 32c0-17.7-14.3-32-32-32s-32 
             14.3-32 32v242.7l-73.4-73.3c-12.5-12.5-32.8-12.5-45.3 
             0s-12.5 32.8 0 45.3l128 128c12.5 
             12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 
             12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 
             274.7V32z"
        />
      </svg>
    </a>
  </template>
                    </div>
                  </li>
                </ul>
              </div>
            </transition>
          </div>
        </div>

        <!-- Lateral derecho: podrías poner más info / CTA -->
        <aside class="space-y-4">
          <div class="bg-white rounded-xl shadow-sm border border-neutral-200 p-5 text-sm">
            <h3 class="text-base font-semibold text-primary mb-2">
              Mecanismo especializado para contratación pública
            </h3>
            <p class="text-neutral-700 leading-relaxed">
              Corporación IMPERIUM administra procesos arbitrales con altos estándares de
              transparencia, imparcialidad y celeridad, alineados a la normativa de contrataciones
              del Estado.
            </p>
          </div>

          <div class="bg-[#071C54] text-white rounded-xl p-5 text-sm space-y-2">
            <p class="text-xs font-semibold tracking-[0.15em] uppercase text-white/70">
              ¿Quieres ser árbitro del Centro?
            </p>
            <p class="text-sm">
              Revisa los requisitos para incorporarte a nuestra nómina de árbitros especializados
              en contratación pública.
            </p>
            <a
              href="/archivos/servicios/arbitraje-en-contrataciones-publicas/lineamientos.pdf"
              target="_blank"
              class="inline-flex mt-2 items-center justify-center rounded-full bg-white text-primary px-4 py-2 text-xs font-semibold hover:bg-white/90"
            >
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
