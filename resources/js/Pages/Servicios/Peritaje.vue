<!-- resources/js/Pages/Servicios/Peritaje.vue -->
<script setup>
import { ref } from 'vue'


const showPdf = ref(false)

const peritajeFile = {
  label: 'Nómina de Peritos',
  href: '/archivos/servicios/peritajes/nomina-de-peritos.pdf',
  type: 'PDF',
}
</script>

<template>


    <!-- HERO -->
    <section
      class="relative w-full py-10 md:py-14 text-white"
      style="background-image:url('/img/peritaje-en-sus-diversas.webp');background-size:cover;background-position:center"
    >
      <div class="absolute inset-0 bg-gradient-to-r from-[#071C54]/90 via-[#071C54]/80 to-[#071C54]/40" />
      <div class="relative max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-8 items-center">
        <div class="space-y-4 md:space-y-5">
          <p class="text-sm uppercase tracking-[0.25em] text-white/80">
            Peritaje en sus diversas especialidades
          </p>

          <h1 class="text-3xl md:text-4xl font-extrabold text-white/90 max-w-xl">
            PERITAJE EN SUS DIVERSAS ESPECIALIDADES
          </h1>

          <p class="text-sm md:text-base text-white/90 max-w-xl">
            Corporación IMPERIUM cuenta con una nómina de peritos especializados en diversas
            materias técnicas, científicas y económicas, que apoyan a los tribunales arbitrales y
            a las partes en la determinación de hechos relevantes para la controversia.
          </p>

          <button
            type="button"
            @click="showPdf = true"
            class="inline-flex items-center justify-center rounded-full bg-white text-primary px-6 py-2.5 font-semibold text-sm hover:bg-white/90 shadow-md"
          >
            VER NÓMINA DE PERITOS
          </button>
        </div>

        <div class="hidden md:flex justify-end">
          <div
            class="bg-white/95 rounded-2xl shadow-xl overflow-hidden max-w-sm w-full border border-white/40"
          >
            <img
              src="/img/banner-arbitraje-publica.webp"
              alt="Peritaje especializado"
              class="w-full h-52 object-cover"
            />
            <div class="p-4 text-sm text-neutral-700">
              <p class="font-semibold text-primary mb-1">
                Peritos especializados a tu disposición
              </p>
              <p>
                Consulta nuestra nómina de peritos para seleccionar al profesional idóneo según la
                materia del arbitraje o la junta de resolución de disputas.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CONTENIDO PRINCIPAL -->
    <section class="py-10 px-4 bg-gray-50">
      <div class="max-w-7xl mx-auto grid lg:grid-cols-[minmax(0,2fr)_minmax(260px,1fr)] gap-10">
        <!-- Lista de archivo (misma estética que los demás) -->
        <div class="space-y-3">
          <div class="border border-neutral-200 rounded-xl bg-white overflow-hidden">
            <div class="px-4 md:px-5 py-3.5 border-b border-neutral-200">
              <p class="text-sm md:text-base font-semibold text-neutral-900">
                Documentos de Peritaje
              </p>
              <p class="text-xs md:text-sm text-neutral-500 mt-0.5">
                Accede a la nómina actualizada de peritos registrados ante Corporación IMPERIUM.
              </p>
            </div>

            <ul class="divide-y divide-neutral-100">
              <li
                class="flex items-center justify-between px-4 md:px-5 py-3 text-sm"
              >
                <div class="flex items-center gap-2">
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
                    {{ peritajeFile.label }}
                  </span>
                </div>

                <div class="flex items-center gap-2">
                  <span
                    class="text-[11px] font-semibold px-2 py-0.5 rounded-full border border-primary/50 text-primary/80"
                  >
                    {{ peritajeFile.type }}
                  </span>

                  <a
                    :href="peritajeFile.href"
                    target="_blank"
                    rel="noopener"
                    class="inline-flex h-8 w-8 items-center justify-center rounded-full text-primary hover:bg-primary/10"
                    :title="`Abrir ${peritajeFile.type} en nueva pestaña`"
                  >
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
        </div>

        <!-- Sidebar -->
        <aside class="space-y-4">
          <div class="bg-white rounded-xl shadow-sm border border-neutral-200 p-5 text-sm">
            <h3 class="text-base font-semibold text-primary mb-2">
              Especialistas por materia
            </h3>
            <p class="text-neutral-700 leading-relaxed">
              La nómina de peritos incluye profesionales con experiencia en ingeniería, economía,
              contabilidad, arquitectura, entre otras disciplinas, garantizando informes técnicos
              confiables y oportunos.
            </p>
          </div>

          <div class="bg-[#071C54] text-white rounded-xl p-5 text-sm space-y-2">
            <p class="text-xs font-semibold tracking-[0.15em] uppercase text-white/70">
              ¿Quieres formar parte de la nómina?
            </p>
            <p class="text-sm">
              Si deseas postular como perito del Centro, contáctanos para conocer los requisitos y
              el proceso de evaluación.
            </p>
            <a
              href="/contacto#peritos"
              class="inline-flex mt-2 items-center justify-center rounded-full bg-white text-primary px-4 py-2 text-xs font-semibold hover:bg-white/90"
            >
              CONTACTAR AL CENTRO
            </a>
          </div>
        </aside>
      </div>
    </section>

    <!-- MODAL PDF -->
    <div
      v-if="showPdf"
      class="fixed inset-0 bg-black/70 z-[999] flex items-center justify-center p-4"
    >
      <div class="bg-white rounded-lg shadow-xl max-w-5xl w-full relative">
        <button
          @click="showPdf = false"
          class="absolute top-2 right-2 bg-primary text-white rounded-full w-8 h-8 flex items-center justify-center hover:bg-primary-dark"
          title="Cerrar"
        >
          ✕
        </button>

        <iframe
          :src="peritajeFile.href"
          class="w-full h-[80vh] rounded-b-lg"
          frameborder="0"
        ></iframe>
      </div>
    </div>
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
