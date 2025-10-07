<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <footer class="relative bg-primary text-white">
    <!-- Separador en onda para que no se pierda con el fondo claro -->
    <svg class="absolute -top-6 left-0 w-full h-6 text-background" viewBox="0 0 1440 48" preserveAspectRatio="none" aria-hidden="true">
      <path fill="currentColor" d="M0,48 C240,0 480,0 720,48 C960,96 1200,96 1440,48 L1440,0 L0,0 Z"/>
    </svg>

    <div class="max-w-7xl mx-auto px-4 pt-10 pb-6 grid gap-10 md:grid-cols-4">
      <!-- Columna: marca -->
      <div>
        <img
          src="/img/logo.png"
          alt="Corporación IMPERIUM — Centro de Arbitraje y Junta de Prevención y Resolución de Disputas"
          class="h-auto w-44 md:w-56 lg:w-64 object-contain"
        />
        <p class="mt-4 text-sm text-white/70">
          © {{ new Date().getFullYear() }} Corporación IMPERIUM. Todos los derechos reservados.
        </p>
      </div>

      <!-- Columna: institucional -->
      <div>
        <h4 class="font-semibold text-white">Institucional</h4>
        <ul class="mt-3 space-y-2 text-white/80">
          <li><Link href="/institucional" class="text-white hover:text-accent">Quiénes somos</Link></li>
          <li><Link href="/servicios" class="text-white hover:text-accent">Servicios</Link></li>
          <li><Link href="/contacto" class="text-white hover:text-accent">Contacto</Link></li>
        </ul>
      </div>

      <!-- Columna: recursos -->
      <div>
        <h4 class="font-semibold text-white">Recursos</h4>
        <ul class="mt-3 space-y-2 text-white/80">
          <li><Link href="/blog" class="text-white hover:text-accent">Blog</Link></li>
          <li><a href="/politica-privacidad" class="text-white hover:text-accent">Política de privacidad</a></li>
          <li><a href="/terminos" class="text-white hover:text-accent">Términos y condiciones</a></li>
        </ul>
      </div>

      <!-- Columna: redes -->
      <div>
        <h4 class="font-semibold text-white">Síguenos</h4>
        <ul class="mt-3 space-y-2 text-white/80">
          <li><a href="https://www.linkedin.com/" target="_blank" rel="noopener" class="text-white hover:text-accent">LinkedIn</a></li>
          <li><a href="https://www.youtube.com/" target="_blank" rel="noopener" class="text-white hover:text-accent">YouTube</a></li>
        </ul>
      </div>
    </div>

    <div class="border-t border-white/10">
      <div class="max-w-7xl mx-auto px-4 py-4 text-sm text-white/60">
        Construido con Laravel · Inertia · Vue 3 · Tailwind.
      </div>
    </div>
  </footer>
</template>
