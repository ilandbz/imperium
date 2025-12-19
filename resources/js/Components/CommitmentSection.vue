<script setup>
import Certificaciones from '@/Components/Certificaciones.vue'
</script>

<template>
  <section class="py-16 px-4 bg-gray-50">
    <!-- ===================== ENCABEZADO ===================== -->
    <div class="max-w-6xl mx-auto text-center mb-12">
      <h2 class="text-3xl md:text-4xl font-bold text-primary mb-2">
        Nuestro Compromiso
      </h2>
      <p class="mt-4 text-neutral-700 font-medium leading-relaxed">
        Somos una institución dedicada a organizar y administrar diversos mecanismos de solución de controversias, entre los cuales destacan el Arbitraje, la Junta de Prevención y Resolución de Disputas (JPRD), el Peritaje en sus distintas especialidades y la Conciliación en todas sus modalidades.
        Nuestro compromiso es promover una cultura de diálogo, equidad y respeto, garantizando procesos transparentes, eficaces y orientados a la paz social.
      </p>      <br> 
      <h3 class="text-2xl font-semibold text-yellow-600">
        Misión y Visión
      </h3>

    </div>

    <!-- ===================== MISIÓN Y VISIÓN ===================== -->
    <div class="grid md:grid-cols-2 gap-10 max-w-6xl mx-auto text-left">
      <!-- Misión -->
      <div class="bg-white shadow-lg rounded-xl p-8 border-t-4 border-primary">
        <h4 class="text-2xl font-bold text-primary mb-3">Misión</h4>
        <p class="text-neutral-700 leading-relaxed">
          Garantizar procesos éticos, transparentes y eficientes en la resolución de controversias, a través de mecanismos alternativos, contribuyendo a la seguridad jurídica y a la Paz Empresarial e institucional y a la Sociedad en general. Nos comprometemos a mantener la excelencia y la imparcialidad en cada caso, sirviendo como un pilar de confianza para nuestros usuarios.
        </p>
      </div>

      <!-- Visión -->
      <div class="bg-white shadow-lg rounded-xl p-8 border-t-4 border-yellow-500">
        <h4 class="text-2xl font-bold text-primary mb-3">Visión</h4>
        <p class="text-neutral-700 leading-relaxed">
          Ser reconocidos como el centro líder en Perú y Latinoamérica y uno de los principales a nivel nacional e internacional en la prevención y resolución de disputas. Buscamos la innovación constante en nuestros procesos y la expansión de nuestra red, manteniendo siempre los más altos estándares de calidad y profesionalismo.
        </p>
      </div>
    </div>

    <!-- ===================== SERVICIOS ===================== -->
    <div class="max-w-5xl mx-auto mt-20">
      <div class="text-center mb-10">
        <h3 class="text-3xl font-bold text-primary">
          Servicios Especializados en Resolución de Conflictos
        </h3>
        <p class="text-neutral-700 mt-3 font-medium">
          Ofrecemos un portafolio completo de soluciones ADR (Alternative Dispute Resolution)
          diseñadas para atender las necesidades específicas del sector público y privado,
          garantizando celeridad y experiencia técnica.
        </p>
      </div>

      <div class="grid md:grid-cols-2 gap-8">
        <!-- Conciliación -->
        <div class="bg-white p-8 rounded-xl shadow-md border-l-4 border-yellow-500">
          <h4 class="text-2xl font-semibold text-yellow-600 mb-2">Conciliación</h4>
          <p class="text-neutral-700 leading-relaxed">
            Mecanismo flexible y confidencial donde las partes, asistidas por un conciliador experto,
            logran un acuerdo mutuo con valor de cosa juzgada, evitando largos litigios judiciales.
          </p>
        </div>

        <!-- Arbitraje -->
        <div class="bg-white p-8 rounded-xl shadow-md border-l-4 border-primary">
          <h4 class="text-2xl font-semibold text-primary mb-2">Arbitraje en Contratación</h4>
          <p class="text-neutral-700 leading-relaxed">
            Resolución definitiva e inapelable de disputas complejas, tanto en contratos públicos como privados.
            Contamos con árbitros altamente calificados en diversas especialidades.
          </p>
        </div>
      </div>
    </div>

    <certificaciones></certificaciones>
  </section>
</template>
