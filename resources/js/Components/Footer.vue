<script setup>
import { Link } from '@inertiajs/vue3'

const year = new Date().getFullYear()

/* ====== Datos editables ====== */
const websiteUrl = 'http://www.imperium.org.pe'
const phoneMain  = '(062) 620227'
const phoneAlt   = '905595297'
const emailHtml  = 'imperium.sg.2021@gmail.com'
const addressHtml =
  'Jr. 28 de Julio N° 1167, 2do Piso – Oficina 05, Huánuco – Perú'

/* Foto del local (opcional). Deja string vacío si no deseas mostrarla */
const localPhoto = '/img/local.jpg' // p.ej. /img/local-imperium.jpg

/* Google Maps embed (más notorio) */
const gmapSrc =
  'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d245.62964994341834!2d-76.2379821943249!3d-9.927761985252047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91a7c31d61ed49b9%3A0x548b548ea1477978!2sJr.%2028%20de%20Julio%201167%2C%20Hu%C3%A1nuco%2010003!5e0!3m2!1ses-419!2spe!4v1761277093769!5m2!1ses-419!2spe'
</script>

<template>
  <footer class="relative bg-primary text-white">
    <!-- Separador en onda -->
    <svg class="absolute -top-6 left-0 w-full h-6 text-background" viewBox="0 0 1440 48" preserveAspectRatio="none" aria-hidden="true">
      <path fill="currentColor" d="M0,48 C240,0 480,0 720,48 C960,96 1200,96 1440,48 L1440,0 L0,0 Z"/>
    </svg>

    <div class="max-w-7xl mx-auto px-4 pt-12 pb-8 grid gap-10 lg:gap-12 md:grid-cols-3">
      <!-- Col 1: Marca + descripción -->
      <div class="space-y-4">
        <img
          src="/img/logo.png"
          alt="Corporación IMPERIUM"
          class="h-auto w-48 md:w-56 object-contain"
        />
        <p class="text-sm leading-relaxed text-white/90 text-justify">
          Somos líderes en eficiencia y transparencia en la administración de arbitrajes en contratación pública,
          arbitraje de emergencia, arbitraje entre privados, Junta de Prevención y Resolución de Disputas (JPRD)
          y peritaje en sus diversas especialidades.
        </p>

        <!-- Enlaces rápidos -->
        <div class="grid grid-cols-2 gap-x-6 gap-y-2 mt-4 text-white/90">
          <Link href="/"                                class="text-white">Inicio</Link>
          <Link href="/#servicios"                       class="text-white">Servicios</Link>
          <Link href="/institucional/quienes-somos"     class="text-white">Nosotros</Link>
          <Link href="/institucional/normas-legales"    class="text-white">Normas Legales</Link>
          <Link href="/politica-privacidad"             class="text-white">Privacidad</Link>
          <Link href="/clausulas-de-solucion-de-controversias" class="text-white">Cláusulas</Link>
        </div>
      </div>

      <!-- Col 2: Contacto + redes + dirección -->
      <div class="space-y-5">
        <div class="flex flex-col gap-3">
          <a
            href="/contacto"
            class="inline-flex items-center gap-2 rounded-full bg-white text-primary px-4 py-2 font-semibold hover:bg-white/90 transition"
          >
            <!-- Teléfono (canal de contacto) -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="18" height="18" class="fill-primary">
              <path d="M164.9 24.6c-7.7-2.5-16-1.1-22.4 3.7l-64 48C72.6 81.1 69.3 89 70.4 97.1C79.1 160.2 108.5 216.3 152.1 259.9s99.7 72.9 162.8 81.6c8.1 1.1 16-2.2 20.8-8.1l48-64c4.8-6.4 6.2-14.7 3.7-22.4L365.5 197c-4.8-14.5-21.6-21.1-35-14.3l-46.3 23.2c-40.7-21.8-73.6-54.7-95.4-95.4l23.2-46.3c6.8-13.4 .2-30.2-14.3-35L164.9 24.6z"/>
            </svg>
            Canal de contacto
          </a>

          <a
            href="/canal-de-denuncias"
            class="inline-flex items-center gap-2 rounded-full bg-white text-primary px-4 py-2 font-semibold hover:bg-white/90 transition"
          >
            <!-- Sobre / denuncias -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="18" height="18" class="fill-primary">
              <path d="M480 64H96C60.7 64 32 92.7 32 128V352c0 35.3 28.7 64 64 64H480c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64zM96 112H480c8.8 0 16 7.2 16 16v74.7L326.6 152.3c-5.9-1.6-12.2-1-17.6 1.8L80 279.1V128c0-8.8 7.2-16 16-16z"/>
            </svg>
            Canal de denuncias
          </a>
        </div>

        <!-- Redes -->
        <div class="flex items-center gap-3">
          <a href="https://www.facebook.com/" target="_blank" rel="noopener" aria-label="Facebook" class="inline-flex rounded-full bg-white/10 hover:bg-white/20 p-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="18" height="18" class="fill-white"><path d="M279.14 288l14.22-92.66h-88.91V127.39c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.14 44.38-121.14 124.72V195.3H22.89V288h81.33V512h100.2V288z"/></svg>
          </a>
          <a href="https://www.instagram.com/" target="_blank" rel="noopener" aria-label="Instagram" class="inline-flex rounded-full bg-white/10 hover:bg-white/20 p-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="18" height="18" class="fill-white"><path d="M224,202.66A53.34,53.34,0,1,0,277.34,256,53.38,53.38,0,0,0,224,202.66Zm124.71-41a54,54,0,0,0-30.81-30.81C300.62,120,224,120,224,120s-76.62,0-93.9,10.84a54,54,0,0,0-30.81,30.81C88,139.38,88,216,88,216s0,76.62,10.84,93.9a54,54,0,0,0,30.81,30.81C171.38,352,248,352,248,352s76.62,0,93.9-10.84a54,54,0,0,0,30.81-30.81C352,292.62,352,216,352,216S352,139.38,348.71,161.66ZM224,338a82,82,0,1,1,82-82A82,82,0,0,1,224,338Zm85-148a19,19,0,1,1,19-19A19,19,0,0,1,309,190Z"/></svg>
          </a>
          <a href="https://www.linkedin.com/" target="_blank" rel="noopener" aria-label="LinkedIn" class="inline-flex rounded-full bg-white/10 hover:bg-white/20 p-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="18" height="18" class="fill-white"><path d="M100.28 448H7.4V149.9h92.88zM53.79 108.1C24.09 108.1 0 83.64 0 54.2a53.93 53.93 0 0 1 107.86 0c0 29.44-24.09 53.9-54.07 53.9zM447.9 448h-92.4V302.4c0-34.7-.7-79.2-48.32-79.2-48.32 0-55.7 37.7-55.7 76.6V448h-92.4V149.9h88.74v40.7h1.3c12.4-23.6 42.6-48.3 87.7-48.3 93.8 0 111.1 61.8 111.1 142.3V448z"/></svg>
          </a>
          <a href="https://www.youtube.com/" target="_blank" rel="noopener" aria-label="YouTube" class="inline-flex rounded-full bg-white/10 hover:bg-white/20 p-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="18" height="18" class="fill-white"><path d="M549.7 124.1c-6.3-23.7-24.9-42.4-48.5-48.7C458.8 64 288 64 288 64S117.2 64 74.8 75.4c-23.7 6.3-42.3 25-48.5 48.7C14 166.5 14 256 14 256s0 89.5 12.3 131.9c6.2 23.7 24.9 42.4 48.5 48.7C117.2 448 288 448 288 448s170.8 0 213.2-11.4c23.6-6.3 42.2-25 48.5-48.7C562 345.5 562 256 562 256s0-89.5-12.3-131.9zM232 338.5v-165L374.6 256 232 338.5z"/></svg>
          </a>
        </div>

        <!-- Dirección + teléfonos + web -->
        <div class="space-y-2 text-white/90">
          <p class="flex gap-2">
            <!-- Ubicación -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="18" height="18" class="mt-1 fill-white">
              <path d="M168 0C75.1 0 0 75.1 0 168c0 87.7 141.7 279.4 163.3 308.2c2.5 3.3 6.5 5.3 10.7 5.3s8.2-2 10.7-5.3C214.3 447.4 356 255.7 356 168C356 75.1 280.9 0 188 0zM188 240c-39.8 0-72-32.2-72-72s32.2-72 72-72s72 32.2 72 72S227.8 240 188 240z"/>
            </svg>
            <span>{{ addressHtml }}</span>
          </p>
          <p class="flex gap-2">
            <!-- Email -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="18" height="18" class="mt-1 fill-white">
              <path d="M502.3 190.8L327.4 338.3c-22.1 18.5-53.6 18.5-75.7 0L9.7 190.8C3.8 185.9 0 178.4 0 170.4V64C0 28.7 28.7 0 64 0h384c35.3 0 64 28.7 64 64v106.4c0 8-3.8 15.5-9.7 20.4zM0 224v224c0 35.3 28.7 64 64 64h384c35.3 0 64-28.7 64-64V224L327.4 371.5c-22.1 18.5-53.6 18.5-75.7 0L0 224z"/>
            </svg>
            <a href="mailto:{{ emailHtml }}" class="text-white hover:underline">{{ emailHtml }}</a>
          </p>
          <p class="flex gap-2">
            <!-- Teléfono -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="18" height="18" class="mt-1 fill-white">
              <path d="M511.1 387.3c3.4 8.7 .9 18.6-6.3 24.6l-67.1 56.9c-7.7 6.5-18.7 7.2-27.2 1.8l-62.3-39.6c-7.9-5-12.2-13.9-10.9-23l8.1-59.1c-63.5-31.6-114.9-83-146.5-146.5L142 210.7c-9.1 1.3-18-3-23-10.9L79.4 137.6c-5.4-8.5-4.7-19.5 1.8-27.2l56.9-67.1c6-7.2 15.9-9.7 24.6-6.3l87.7 34.1c9.1 3.5 15.1 12.3 14.9 22L263 153.2c27.9 62 77.8 111.9 139.8 139.8l59.1-5.3c9.7-.2 18.5 5.8 22 14.9l34.1 84.7z"/>
            </svg>
            <a :href="`tel:${phoneMain.replace(/[^0-9]/g,'')}`" class="hover:underline text-white/90">{{ phoneMain }}</a>
            <span>–</span>
            <a :href="`tel:${phoneAlt.replace(/[^0-9]/g,'')}`" class="hover:underline text-white/90">{{ phoneAlt }}</a>
          </p>
          <p class="flex gap-2">
            <!-- Sitio web -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" width="18" height="18" class="mt-1 fill-white">
              <path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 448c-110.5 0-200-89.5-200-200S137.5 56 248 56s200 89.5 200 200-89.5 200-200 200z"/>
            </svg>
            <a :href="websiteUrl" target="_blank" rel="noopener" class="hover:underline text-white/90">
              {{ websiteUrl.replace(/^https?:\/\//,'') }}
            </a>
          </p>

        </div>
      </div>

      <!-- Col 3: Foto del local + Mapa (más grande) -->
      <div class="space-y-4">
        <img
          v-if="localPhoto"
          :src="localPhoto"
          alt="Foto del local"
          class="w-full h-32 md:h-36 lg:h-40 object-cover rounded-xl border border-white/20 shadow-lg"
          loading="lazy"
        />
        <div class="rounded-xl overflow-hidden border border-white/20 shadow-lg">
          <iframe
            :src="gmapSrc"
            width="100%"
            height="240"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="Mapa de ubicación"
            class="w-full"
          ></iframe>
        </div>
      </div>
    </div>

    <!-- Barra inferior -->
    <!-- <div class="border-t border-white/10">
      <div class="max-w-7xl mx-auto px-4 py-4 text-sm text-white/80 flex flex-col md:flex-row items-center justify-between gap-2">
        <span>© {{ year }} Corporación IMPERIUM. Todos los derechos reservados.</span>
        <span class="text-white/60">Construido con Laravel · Inertia · Vue 3 · Tailwind</span>
      </div>
    </div> -->
  </footer>
</template>
