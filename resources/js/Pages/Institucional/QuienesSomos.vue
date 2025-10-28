<script setup>
import { Head } from '@inertiajs/vue3'
import SiteLayout from '@/Layouts/SiteLayout.vue'
import Certificaciones from '@/Components/Certificaciones.vue'
import PoliticasSection from '@/Components/PoliticasSection.vue'
</script>

<template>
  <SiteLayout>
    <Head title="¿Quiénes Somos? | Corporación Imperium" />

    <!-- HERO con imagen de fondo -->
    <section class="relative">
      <!-- Fondo -->
      <div class="absolute inset-0">
        <!-- Cambia el src por tu imagen -->
        <img
          src="/img/quienes-somos.jpg"
          alt="Equipo de Corporación Imperium"
          class="w-full h-full object-cover"
        />
        <!-- Overlay -->
        <div class="absolute inset-0 bg-primary/60"></div>
      </div>

      <!-- Contenido sobre el fondo -->
      <div class="relative max-w-6xl mx-auto px-4 py-20 md:py-28">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight">
          ¿QUIÉNES<br class="hidden md:block" /> SOMOS?
        </h1>
      </div>
    </section>

    <!-- Breadcrumb / Ruta -->
    <nav class="bg-white" aria-label="breadcrumb">
      <div class="max-w-6xl mx-auto px-4 py-3 text-primary flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" class="fill-current">
          <path d="M12.293 5.293a1 1 0 011.414 1.414L10.414 10l3.293 3.293a1 1 0 01-1.414 1.414L8.586 10l3.707-4.707z"/>
        </svg>
        <span class="font-medium">» Nosotros</span>
      </div>
    </nav>

<section class="py-12 px-6 bg-gray-50">
  <div class="max-w-5xl mx-auto">
    <p class="text-neutral-700 text-justify leading-relaxed text-lg">
      Somos una institución dedicada a organizar y administrar distintos mecanismos de solución de controversias, entre los cuales se destaca el <b>Arbitraje en Contratación Pública</b>, el <b>Arbitraje de Emergencia</b>, el <b>Arbitraje entre Privados</b>, la <b>Junta de Prevención y Resolución de Disputas (JPRD)</b> y el <b>Peritaje</b> en sus distintas especialidades. Además, contamos con servicios de <b>Conciliación</b> en sus diversas modalidades, orientados a facilitar acuerdos equitativos y fortalecer la cultura de paz mediante el diálogo y la mediación. Con más de diez (10) años de experiencia en la administración de mecanismos de solución de controversias, nuestra trayectoria está avalada por las certificaciones <b>ISO 9001:2015</b> y <b>ISO 37001:2016</b> en Sistema de Gestión Antisoborno, otorgadas por la prestigiosa certificadora internacional SGS, garantizando la máxima calidad y transparencia en todos nuestros procesos. Asimismo, hemos obtenido la <b>ISO 27001:2022</b> en Sistema de Gestión de Seguridad de la Información, reflejando nuestro compromiso institucional con la excelencia. En materia de Conciliación contamos con el reconocimiento oficial del <b>MINJUSDH</b>, refrendado por la <b>Resolución N.º 1518-2013-JUS-DGDP-DCMA</b>, lo que certifica nuestra solidez institucional. Somos líderes especializados en Conciliación, Arbitraje y Juntas de Prevención y Resolución de Disputas (JPRD), ofreciendo mecanismos alternativos efectivos, confidenciales y basados en principios de ética, profesionalismo y transparencia.
    </p>
  </div>
</section>

    <!-- Misión / Visión (igual que ya tenías) -->
    <section class="bg-white py-8 px-4 text-gray-800">
      <div class="max-w-5xl mx-auto flex flex-col gap-8">
        <!-- Misión -->
        <div class="bg-primary text-white p-8 rounded-xl flex flex-col md:flex-row md:gap-12 items-center">
          <div class="flex flex-col justify-center items-center text-center md:w-1/4">
            <h3 class="font-bold text-white md:text-lg xl:text-xl mb-2">MISIÓN</h3>
            <img
              src="/img/mision.webp"
              alt="Misión"
              width="80" height="80"
              class="w-[60px] xl:w-[80px] xl:h-[80px] object-contain"
            />
          </div>
          <p class="md:w-3/4 leading-relaxed text-justify">
            Garantizar procesos éticos, transparentes y eficientes en la resolución de controversias,
            a través de mecanismos alternativos, contribuyendo a la seguridad jurídica y a la Paz
            Empresarial e institucional y a la Sociedad en general. Nos comprometemos a mantener la
            excelencia y la imparcialidad en cada caso, sirviendo como un pilar de confianza para
            nuestros usuarios.
          </p>
        </div>

        <!-- Visión -->
        <div class="bg-primary text-white p-8 rounded-xl flex flex-col md:flex-row md:gap-12 items-center">
          <div class="flex flex-col justify-center items-center text-center md:w-1/4">
            <h3 class="font-bold text-white md:text-lg xl:text-xl mb-2">VISIÓN</h3>
            <img
              src="/img/vision.webp"
              alt="Visión"
              width="80" height="80"
              class="w-[60px] xl:w-[80px] xl:h-[80px] object-contain"
            />
          </div>
          <p class="md:w-3/4 leading-relaxed text-justify">
            Ser reconocidos como el centro líder en Perú y Latinoamérica y uno de los principales
            a nivel nacional e internacional en la prevención y resolución de disputas. Buscamos la
            innovación constante en nuestros procesos y la expansión de nuestra red, manteniendo
            siempre los más altos estándares de calidad y profesionalismo.
          </p>
        </div>
      </div>
    </section>

    <!-- Compromiso -->
    <section class="bg-white py-8 px-4 text-gray-800">
      <div class="max-w-6xl mx-auto text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-primary mb-2">Nuestro Compromiso</h2>
        <p class="mt-4 text-neutral-700 font-medium leading-relaxed">
          Somos una institución dedicada a organizar y administrar diversos mecanismos de solución de
          controversias, entre los cuales destacan el Arbitraje, la Junta de Prevención y Resolución de
          Disputas (JPRD), el Peritaje en sus distintas especialidades y la Conciliación en todas sus
          modalidades. Nuestro compromiso es promover una cultura de diálogo, equidad y respeto,
          garantizando procesos transparentes, eficaces y orientados a la paz social.
        </p>
      </div>
    </section>

    <Certificaciones />
    <PoliticasSection />
  </SiteLayout>
</template>
