<script setup>
import { Head } from '@inertiajs/vue3'
import SiteLayout from '@/Layouts/SiteLayout.vue'
</script>

<template>
  <SiteLayout>
    <Head title="¿Quiénes Somos? | Corporación Imperium" />

    <!-- Sección principal -->
    <section class="py-12 px-4 bg-gray-50">
      <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-8 items-center">
        <!-- Texto -->
        <div>
          <h1 class="text-4xl font-bold text-primary mb-4">¿Quiénes Somos?</h1>
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

    <!-- Sección adicional: Cultura de Paz y Trayectoria -->
    <section class="py-16 px-4 bg-white border-t border-gray-200">
      <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10 items-center">
        
        <!-- Imagen lateral -->
        <div class="flex justify-center items-center order-2 md:order-1">
          <img
            src="/img/cultura-paz.jpg"
            alt="Cultura de Paz y Justicia Ágil"
            class="rounded-xl shadow-md max-w-full h-auto object-cover"
          />
        </div>

        <!-- Texto -->
        <div class="order-1 md:order-2">
          <h2 class="text-3xl font-bold text-primary mb-4 flex items-center gap-2">
            ⚖️ Cultura de Paz y Justicia Ágil
          </h2>
          <p class="text-neutral-700 mb-6 leading-relaxed">
            Promovemos la seguridad jurídica y una cultura de paz, alineándonos con las demandas nacionales e
            internacionales como el socio estratégico ideal de su empresa o institución pública y privada.
          </p>

          <h2 class="text-2xl font-semibold text-primary mb-2 flex items-center gap-2">
            ⏱️ 12 Años de Trayectoria
          </h2>
          <p class="text-neutral-700 leading-relaxed">
            Más de <strong>12 años de experiencia</strong> consolidando un éxito basado en la ética,
            eficiencia y total transparencia, ofreciendo soluciones de calidad.
          </p>
        </div>
      </div>
    </section>
  </SiteLayout>
</template>
