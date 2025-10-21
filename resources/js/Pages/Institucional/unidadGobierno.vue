<script setup>
import { Head } from '@inertiajs/vue3'
import SiteLayout from '@/Layouts/SiteLayout.vue'
</script>

<template>
  <SiteLayout>
    <Head title="UNIDAD DE GOBIERNO | Corporación Imperium" />

    <!-- Sección principal -->
    <section class="py-12 px-4 bg-gray-50">
      <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-8 items-center">
        <!-- Texto -->
        <div>
          <h1 class="text-4xl font-bold text-primary mb-4">UNIDAD DE GOBIERNO</h1>
          <p class="text-neutral-700 mb-4 leading-relaxed">
            <strong>Corporación Imperium</strong> es una institución líder especializada en la
            <span class="text-primary font-semibold">prevención y resolución de controversias</span> en el ámbito
            legal y empresarial, enfocada en mecanismos alternativos de solución de conflictos.
          </p>

          <h2 class="text-2xl font-semibold text-primary mt-6 mb-2">
            Solidez Institucional Certificada
          </h2>
          <p class="text-neutral-700 mb-4 leading-relaxed">
            En materia de Conciliación contamos con el reconocimiento oficial del <strong>MINJUSDH</strong>,
            refrendado por la Resolución N.º 1518-2013-JUS-DGDP-DCMA, lo que certifica nuestro compromiso.
          </p>

          <h2 class="text-2xl font-semibold text-primary mt-6 mb-2">
            Prevención y Resolución de Controversias
          </h2>
          <p class="text-neutral-700 leading-relaxed">
            Somos líderes especializados en Conciliación, Arbitraje y Juntas de Prevención y Resolución de Disputas (JPRD),
            ofreciendo mecanismos alternativos efectivos y confidenciales.
          </p>
        </div>

        <!-- Imagen -->
        <div class="flex justify-center items-center">
          <img
            src="/img/quienes-somos.jpg"
            alt="Corporación Imperium"
            class="rounded-xl shadow-lg max-w-full h-auto object-cover"
          />
        </div>
      </div>
    </section>


  </SiteLayout>
</template>
