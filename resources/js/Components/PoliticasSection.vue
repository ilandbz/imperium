<template>
  <section class="bg-white py-12 px-4 text-gray-800">
    <div class="max-w-6xl mx-auto flex flex-col gap-8">
      <!-- Título -->
      <h3 class="subtitle text-center text-primary">POLÍTICAS</h3>
      <p class="texto text-center">
        Nos comprometemos a mantener altos estándares de calidad, ética y transparencia. A continuación, encontrarás las políticas que guían nuestras operaciones y aseguran una gestión responsable.
      </p>

      <p class="texto font-semibold text-center">
        Accede a nuestras políticas a través de los siguientes enlaces:
      </p>

      <!-- Enlaces de políticas -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-4">
        <a
          v-for="(item, index) in politicas"
          :key="index"
          :href="item.url"
          target="_blank"
          rel="noopener"
          class="border-2 border-primary rounded-lg p-4 flex flex-col lg:flex-row items-center justify-center gap-3 hover:bg-blue-50 transition-all duration-300 hover:shadow-md"
        >
          <img
            src="/img/file-lines.webp"
            alt="Documento"
            width="60"
            height="60"
            class="w-[60px] h-[60px] object-contain"
          />
          <span class="font-medium text-sm text-center lg:text-left leading-snug">{{ item.nombre }}</span>
        </a>
      </div>

      <!-- Licencia Municipal -->
      <div class="flex w-full justify-center items-center my-12 p-8 rounded-2xl flex-col gap-4 shadow-custom bg-primary text-center">
        <h3 class="text-white subtitle">LICENCIA MUNICIPAL DE FUNCIONAMIENTO</h3>
        <a
          href="/archivos/licencia.pdf"
          target="_blank"
          class="px-4 py-2 bg-white text-primary border-2 border-white rounded-xl font-medium hover:bg-transparent hover:text-white transition-all duration-300"
        >
          Ver aquí
        </a>
      </div>
    </div>
  </section>
</template>

<script setup>
const politicas = [
  {
    nombre: "Política de Sistema de Gestión de Calidad",
    url: "https://cearlatinoamericano.pe/rsc/public/nosotros/archivos/poltica-de-sistema-de-gestin-de-calidad.pdf",
  },
  {
    nombre: "Política de Sistema de Gestión Antisoborno",
    url: "https://cearlatinoamericano.pe/rsc/public/nosotros/archivos/poltica-de-sistema-de-gestin-antisoborno.pdf",
  },
  {
    nombre: "Política de Protección a los Trabajadores",
    url: "https://cearlatinoamericano.pe/rsc/public/nosotros/archivos/poltica-de-proteccin-a-los-trabajadores.pdf",
  },
  {
    nombre: "Política de Regalos, Atenciones...",
    url: "https://cearlatinoamericano.pe/rsc/public/nosotros/archivos/poltica-de-regalos-atenciones.pdf",
  },
  {
    nombre: "Política Sistema de Gestión de Seguridad de la Información",
    url: "https://cearlatinoamericano.pe/rsc/public/nosotros/archivos/poltica-sistema-de-gestin-de-seguridad-de-la-informacin.pdf",
  },
  {
    nombre: "Política de Seguridad de Proveedores",
    url: "https://cearlatinoamericano.pe/rsc/public/nosotros/archivos/poltica-de-seguridad-de-proveedores.pdf",
  },
  {
    nombre: "Política de Privacidad de Datos",
    url: "https://cearlatinoamericano.pe/rsc/public/nosotros/archivos/poltica-de-privacidad-de-datos.pdf",
  },
  {
    nombre: "Código de Ética",
    url: "/rsc/public/files/2025/politicas/CÓDIGO DE ÉTICA DEL CEAR LATINOAMERICANO.pdf",
  },
];
</script>
