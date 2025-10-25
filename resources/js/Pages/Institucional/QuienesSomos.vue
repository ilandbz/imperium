<script setup>
import { Head } from '@inertiajs/vue3'
import SiteLayout from '@/Layouts/SiteLayout.vue'
import Certificaciones from '@/Components/Certificaciones.vue'
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
          <p class="text-neutral-700 text-justify">
            Somos una institución dedicada a organizar y administrar distintos mecanismos de solución de controversias, entre los cuales se destaca: Arbitraje en Contratación Pública, Arbitraje de Emergencia, Arbitraje entre Privados, Junta de Prevención y Resolución de Disputas (JPRD) y Peritaje en sus distintas especialidades. Además, contamos con servicios de conciliación en sus diversas modalidades, orientados a facilitar acuerdos equitativos y fortalecer la cultura de paz mediante el diálogo y la mediación.
          </p>

          <p class="text-neutral-700 text-justify">
            Contamos con más de diez (10) años de experiencia en la administración de mecanismos de solución de controversias. Nuestra experiencia está avalada por las certificaciones ISO 9001:2015 ISO 37001:2016 en Sistema de Gestión Antisoborno, otorgadas por la prestigiosa certificadora internacional SGS, garantizando la máxima calidad y transparencia en todos nuestros procesos. En igual sentido, hemos obtenido el ISO 27001:2022 en Sistema de Gestión de Seguridad de la Información.
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
    <section class="bg-white py-8 px-4 text-gray-800">
      <div class="max-w-5xl mx-auto flex flex-col gap-8">
        <!-- Misión -->
        <div class="bg-primary text-white p-8 rounded-xl flex flex-col md:flex-row md:gap-12 items-center">
          <div class="flex flex-col justify-center items-center text-center md:w-1/4">
            <h3 class="font-bold text-white md:text-lg xl:text-xl mb-2">MISIÓN</h3>
            <img src="/img/mision.webp" alt="Misión" width="80" height="80"
                class="w-[60px] xl:w-[80px] xl:h-[80px] object-contain">
          </div>
          <p class="md:w-3/4 leading-relaxed text-justify">
            Garantizar procesos éticos, transparentes y eficientes en la resolución de controversias, a través de mecanismos alternativos, contribuyendo a la seguridad jurídica y a la Paz Empresarial e institucional y a la Sociedad en general. Nos comprometemos a mantener la excelencia y la imparcialidad en cada caso, sirviendo como un pilar de confianza para nuestros usuarios.
          </p>
        </div>

        <!-- Visión -->
        <div class="bg-primary text-white p-8 rounded-xl flex flex-col md:flex-row md:gap-12 items-center">
          <div class="flex flex-col justify-center items-center text-center md:w-1/4">
            <h3 class="font-bold text-white md:text-lg xl:text-xl mb-2">VISIÓN</h3>
            <img src="/img/vision.webp" alt="Visión" width="80" height="80"
                class="w-[60px] xl:w-[80px] xl:h-[80px] object-contain">
          </div>
          <p class="md:w-3/4 leading-relaxed text-justify">
            Ser reconocidos como el centro líder en Perú y Latinoamérica y uno de los principales a nivel nacional e internacional en la prevención y resolución de disputas. Buscamos la innovación constante en nuestros procesos y la expansión de nuestra red, manteniendo siempre los más altos estándares de calidad y profesionalismo.
          </p>
        </div>
      </div>
    </section>
    <section class="bg-white py-8 px-4 text-gray-800">
      <div class="max-w-6xl mx-auto text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-primary mb-2">
          Nuestro Compromiso
        </h2>
        <p class="mt-4 text-neutral-700 font-medium leading-relaxed">
          Somos una institución dedicada a organizar y administrar diversos mecanismos de solución de controversias, entre los cuales destacan el Arbitraje, la Junta de Prevención y Resolución de Disputas (JPRD), el Peritaje en sus distintas especialidades y la Conciliación en todas sus modalidades.
          Nuestro compromiso es promover una cultura de diálogo, equidad y respeto, garantizando procesos transparentes, eficaces y orientados a la paz social.
        </p>      <br> 
      </div>
    </section>
    <certificaciones></certificaciones>
  </SiteLayout>
</template>
