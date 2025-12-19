<script setup>
import { ref } from 'vue'

const props = defineProps({
  // A dónde redirigir tras “Iniciar sesión”
  redirectTo: { type: String, default: '/dashboard' }
})

const user = ref('')
const pass = ref('')
const showPass = ref(false)
const loading = ref(false)

function togglePass() {
  showPass.value = !showPass.value
}

async function onSubmit(e) {
  e.preventDefault()
  loading.value = true
  // Aquí iría tu POST real con Inertia/axios al backend.
  // Simulamos un pequeño delay y redirigimos:
  setTimeout(() => {
    window.location.href = props.redirectTo
  }, 600)
}
</script>

<template>
  <section
    class="min-h-screen w-full relative flex items-center justify-center"
  >
    <!-- Fondo -->
    <div
      class="absolute inset-0 bg-[url('/img/bg-login.jpg')] bg-cover bg-center"
      aria-hidden="true"
    />
    <!-- Overlay teal/azul -->
    <div class="absolute inset-0 bg-teal-600/40" aria-hidden="true" />

    <!-- Card -->
    <div
      class="relative z-10 mx-4 w-full max-w-xl bg-white rounded-xl shadow-xl border border-gray-100"
    >
      <div class="px-8 pt-8 pb-2 flex justify-center">
        <img
          src="/img/logo_sin_fondo.png"
          alt="Corporación Imperium"
          class="h-36 object-contain"
        />
      </div>

      <h1 class="text-center text-primary text-xl font-bold mb-6">
        SIREA
      </h1>

      <form class="px-8 pb-8 space-y-4" @submit="onSubmit">
        <!-- Usuario -->
        <div>
          <label class="block text-sm font-medium text-neutral-700 mb-1">
            Usuario
          </label>
          <div class="relative">
            <span class="absolute inset-y-0 left-3 flex items-center text-neutral-400">
              <!-- user icon -->
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="18" height="18"><path fill="currentColor" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
            </span>
            <input
              v-model="user"
              type="text"
              class="w-full rounded-md border border-gray-300 pl-10 pr-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary/30"
              placeholder="Ingresa tu usuario"
              required
            />
          </div>
        </div>

        <!-- Contraseña -->
        <div>
          <label class="block text-sm font-medium text-neutral-700 mb-1">
            Contraseña
          </label>
          <div class="relative">
            <span class="absolute inset-y-0 left-3 flex items-center text-neutral-400">
              <!-- lock icon -->
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="18" height="18"><path fill="currentColor" d="M144 144V192h160V144a80 80 0 1 0-160 0zM96 192V144a128 128 0 1 1 256 0v48h16c26.5 0 48 21.5 48 48V464c0 26.5-21.5 48-48 48H80c-26.5 0-48-21.5-48-48V240c0-26.5 21.5-48 48-48h16z"/></svg>
            </span>

            <input
              :type="showPass ? 'text' : 'password'"
              v-model="pass"
              class="w-full rounded-md border border-gray-300 pl-10 pr-10 py-2 focus:outline-none focus:ring-2 focus:ring-primary/30"
              placeholder="Ingresa tu contraseña"
              required
            />

            <button
              class="absolute inset-y-0 right-3 flex items-center text-neutral-400 hover:text-neutral-600"
              type="button"
              @click="togglePass"
              :aria-label="showPass ? 'Ocultar contraseña' : 'Mostrar contraseña'"
            >
              <!-- eye / eye-off -->
              <svg v-if="!showPass" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="18" height="18"><path fill="currentColor" d="M572.52 241.4C518.73 135.59 407.49 64 288 64S57.27 135.59 3.48 241.4a48.07 48.07 0 0 0 0 45.2C57.27 376.41 168.51 448 288 448s230.73-71.59 284.52-161.4a48.07 48.07 0 0 0 0-45.2zM288 400c-97.05 0-187.56-54.46-240-144C100.44 166.46 190.95 112 288 112s187.56 54.46 240 144c-52.44 89.54-142.95 144-240 144zm0-240a96 96 0 1 0 96 96 96.11 96.11 0 0 0-96-96z"/></svg>
              <svg v-else xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="18" height="18"><path fill="currentColor" d="M320 96c-49.3 0-93.2 18.3-126.8 47.7l39.9 31.3C256.2 157.9 286.8 144 320 144c79.5 0 144 64.5 144 144c0 33.2-13.9 63.8-31 86.9l31.3 39.9C525.7 413.2 544 369.3 544 320C544 206.1 433.9 96 320 96zM32 96L0 128l80.8 63.4C55.6 224.8 40 271 40 320c0 113.9 110.1 224 224 224c49.3 0 93.2-18.3 126.8-47.7L512 640l32-32L32 96z"/></svg>
            </button>
          </div>
        </div>

        <!-- reCAPTCHA (placeholder) -->
        <div class="rounded-md border border-gray-300 p-3">
          <div class="h-14 w-full bg-gray-100 rounded flex items-center justify-between px-3 text-xs text-neutral-600">
            <span>No soy un robot (placeholder)</span>
            <span>reCAPTCHA</span>
          </div>
        </div>

        <!-- Botones -->
        <div class="flex flex-col sm:flex-row gap-3 pt-2">
          <button
            type="submit"
            :disabled="loading"
            class="flex-1 bg-primary text-white font-semibold rounded-md py-2 hover:bg-primary-dark disabled:opacity-70"
          >
            {{ loading ? 'Ingresando…' : 'Iniciar sesión' }}
          </button>

          <a
            href="/recuperar-contraseña"
            class="flex-1 text-center border-2 border-primary text-primary font-semibold rounded-md py-2 hover:bg-primary/10"
          >
            Recuperar contraseña
          </a>
        </div>


      </form>
    </div>
  </section>
</template>
