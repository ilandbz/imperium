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
    url: "/archivos/politicas/POLITICA_DE_SISTEMA_DE_GESTION_DE_CALIDAD.pdf",
  },
  {
    nombre: "Política de Sistema de Gestión Antisoborno",
    url: "/archivos/politicas/POLITICA_DEL_SISTEMA_DE_GESTIÓN_ANTISOBORNO.pdf",
  },
  {
    nombre: "Política de Protección a los Trabajadores",
    url: "/archivos/politicas/POLITICA_DE_PROTECCION_A_LOS_TRABAJADOORES.pdf",
  },
  {
    nombre: "Política de Regalos, Atenciones...",
    url: "/archivos/politicas/POLITICA_DE_REGALOS,_ATENCIONES_Y_CORTESIAS_O_CUALQUIER_TIPO_DE_GRATIFICACION.pdf",
  },
  {
    nombre: "Política Sistema de Gestión de Seguridad de la Información",
    url: "/archivos/politicas/POLITICA_DEL_SISTEMA_DE_GESTION_DE_SEGURIDAD_DE_LA_INFORMACION.pdf",
  },
  {
    nombre: "Política de Seguridad de Proveedores",
    url: "/archivos/politicas/POLITICA_DE_SEGURIDAD_DE_PROVEEDORES.pdf",
  },
  {
    nombre: "Política de Privacidad de Datos",
    url: "/archivos/politicas/POLITICA_DE_PRIVACIDAD_DE_DATOS.pdf",
  },
  {
    nombre: "Código de Ética",
    url: "/archivos/politicas/CONSORCIO_ETICA_CONDUCTA.pdf",
  },
];
</script>
