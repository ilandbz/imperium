<script setup>
import { useAutenticacion } from '@/Composables/autenticacion'
import { ref, watch } from 'vue'

const { errors, loginUsuario } = useAutenticacion()

const showPass = ref(false)
const loading = ref(false)

const user = ref({
  name: '',
  password: '',
  remember: false,
})

function togglePass() {
  showPass.value = !showPass.value
}

function clearError(key) {
  if (!errors) return

  // errors = ref({})
  if ('value' in errors) {
    if (errors.value?.[key]) {
      const copy = { ...errors.value }
      delete copy[key]
      errors.value = copy
    }
    return
  }

  // errors = reactive({})
  if (errors[key]) delete errors[key]
}

watch(() => user.value.name, () => clearError('name'))
watch(() => user.value.password, () => clearError('password'))

const autenticar = async () => {
  if (loading.value) return
  loading.value = true
  try {
    await loginUsuario(user.value)
  } finally {
    loading.value = false
  }
}
</script>

<template>
  <section class="min-h-screen w-full relative flex items-center justify-center bg-gray-100">
    <!-- Fondo original (se puede mantener o cambiar si lo prefieren) -->
    <div class="absolute inset-0 bg-primary/10 bg-cover bg-center" aria-hidden="true"></div>

    <!-- Header proporcionado -->
    <header class="absolute top-0 right-0 z-30 hidden w-full shrink-0 justify-end px-8 pt-8 pointer-events-none lg:flex">
      <div class="flex gap-4 pointer-events-auto">
        <div class="animate-entry-up [animation-delay:200ms]" data-state="closed" data-slot="tooltip-trigger"><a href="https://sistelar.pe/sistema_arbitral/public/assets/REGISTRO.pdf" target="_blank" rel="noopener noreferrer" class="flex h-11 w-11 sm:h-12 sm:w-12 items-center justify-center rounded-xl bg-white shadow-[0_10px_25px_-5px_rgba(0,0,0,0.15)] transition-all hover:scale-110 active:scale-95 group cursor-pointer animate-pulse-subtle hover:animate-none"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book h-5 w-5 sm:h-6 sm:w-6 text-primary transition-transform group-hover:rotate-2 group-hover:scale-110" aria-hidden="true"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"></path></svg></a></div>
        <div class="animate-entry-up [animation-delay:400ms]" data-state="closed" data-slot="tooltip-trigger"><button type="button" class="flex h-11 w-11 sm:h-12 sm:w-12 items-center justify-center rounded-xl bg-white shadow-[0_10px_25px_-5px_rgba(0,0,0,0.15)] transition-all hover:scale-110 active:scale-95 group cursor-pointer animate-pulse-subtle hover:animate-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-_r_1_" data-state="closed" data-slot="dialog-trigger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-video h-5 w-5 sm:h-6 sm:w-6 text-primary transition-transform group-hover:rotate-2 group-hover:scale-110" aria-hidden="true"><path d="m16 13 5.223 3.482a.5.5 0 0 0 .777-.416V7.87a.5.5 0 0 0-.752-.432L16 10.5"></path><rect x="2" y="6" width="14" height="12" rx="2"></rect></svg></button></div>
        <div class="animate-entry-up [animation-delay:600ms]" data-state="closed" data-slot="tooltip-trigger"><button type="button" class="flex h-11 w-11 sm:h-12 sm:w-12 items-center justify-center rounded-xl bg-white shadow-[0_10px_25px_-5px_rgba(0,0,0,0.15)] transition-all hover:scale-110 active:scale-95 group cursor-pointer animate-pulse-subtle hover:animate-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-_r_5_" data-state="closed" data-slot="dialog-trigger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-question-mark h-5 w-5 sm:h-6 sm:w-6 text-primary transition-transform group-hover:rotate-2 group-hover:scale-110" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><path d="M12 17h.01"></path></svg></button></div>
      </div>
    </header>

    <!-- Tarjeta Principal -->
    <div class="relative z-10 mx-4 w-full max-w-[900px] bg-white rounded-3xl shadow-2xl flex flex-col md:flex-row overflow-hidden min-h-[550px]">
      
      <!-- Panel Izquierdo (Branding) -->
      <div class="bg-primary text-white p-10 flex flex-col justify-between md:w-5/12 relative overflow-hidden">
        <!-- Contenido principal -->
        <div class="relative z-10 flex flex-col h-full">
          
          <!-- Logo más grande y centrado en el espacio disponible -->
          <div class="flex-1 flex items-center justify-center">
            <img src="/img/logo_sin_fondo.png" alt="Corporación Imperium" class="h-40 object-contain filter brightness-0 invert" />
          </div>
          
          <div class="mt-auto flex flex-col items-center text-center">
            <p class="text-xl font-light opacity-90 leading-snug mb-8">
              Garantía de un proceso eficiente y transparente
            </p>

            <!-- Bandera / País -->
            <div class="inline-flex items-center gap-2 bg-white px-6 py-2.5 rounded-full font-bold text-sm shadow-sm">
              <span class="text-gray-800">PE</span>
              <span class="text-primary">Perú</span>
            </div>
          </div>
        </div>
        
        <!-- Patrón de puntos de fondo decorativo -->
        <div class="absolute inset-0 opacity-[0.08]" style="background-image: radial-gradient(circle, white 2px, transparent 2px); background-size: 24px 24px;"></div>
      </div>

      <!-- Panel Derecho (Formulario de Inicio de Sesión) -->
      <div class="p-10 md:p-12 flex flex-col justify-center md:w-7/12 bg-white">
        
        <div class="text-center mb-8">
          <h2 class="text-2xl font-bold text-gray-800">Inicio de sesión</h2>
          <p class="text-gray-500 text-sm mt-1">Ingrese sus credenciales para continuar</p>
        </div>

        <form class="space-y-5 max-w-sm mx-auto w-full" @submit.prevent="autenticar">
          <!-- Usuario -->
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Usuario</label>
            <input
              v-model="user.name"
              type="text"
              :class="[
                'w-full rounded-xl border px-4 py-2.5 text-sm focus:outline-none focus:ring-2 transition-colors',
                errors.name ? 'border-red-500 focus:ring-red-200' : 'border-gray-200 focus:border-primary focus:ring-primary/20'
              ]"
              placeholder="Usuario o correo"
              autocomplete="name"
              @input="clearError('name')"
            />
            <p v-if="errors.name" class="text-red-600 text-xs mt-1">{{ errors.name }}</p>
          </div>

          <!-- Contraseña -->
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Contraseña</label>
            <div class="relative">
              <input
                :type="showPass ? 'text' : 'password'"
                v-model="user.password"
                :class="[
                  'w-full rounded-xl border pl-4 pr-12 py-2.5 text-sm focus:outline-none focus:ring-2 transition-colors',
                  errors.password ? 'border-red-500 focus:ring-red-200' : 'border-gray-200 focus:border-primary focus:ring-primary/20'
                ]"
                placeholder="********"
                autocomplete="current-password"
                @input="clearError('password')"
              />
              <button
                class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600"
                type="button"
                @click="togglePass"
              >
                <svg v-if="!showPass" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                <svg v-else xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/><path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/><line x1="2" y1="2" x2="22" y2="22"/></svg>
              </button>
            </div>
            <p v-if="errors.password" class="text-red-600 text-xs mt-1">{{ errors.password }}</p>
          </div>

          <!-- Opciones adicionales -->
          <div class="flex items-center justify-between mt-2 pt-1">
            <label class="flex items-center gap-2 cursor-pointer">
              <input type="checkbox" v-model="user.remember" class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary" />
              <span class="text-sm text-gray-600">Recordar sesión</span>
            </label>
            <a href="/recuperar-contraseña" class="text-sm text-primary font-medium hover:underline">¿Olvidaste tu contraseña?</a>
          </div>

          <!-- Botón de Envío -->
          <button
            type="submit"
            :disabled="loading"
            class="w-full bg-primary text-white font-bold rounded-xl py-3 mt-4 hover:bg-primary/90 transition-colors disabled:opacity-70 shadow-[0_4px_14px_0_rgba(var(--primary-rgb),0.39)]"
          >
            {{ loading ? 'Ingresando…' : 'Ingresar' }}
          </button>
          
          <!-- Enlaces de registro -->
          <div class="mt-6 text-center text-sm text-gray-600">
            ¿Aún no tienes una cuenta? <a href="#" class="text-primary font-bold hover:underline">Regístrate aquí</a>
          </div>

          <!-- Mensaje de ayuda -->
          <div class="mt-6 bg-gray-50 rounded-xl p-4 text-[11px] text-gray-500 text-center border border-gray-100 leading-relaxed">
            Para usuarios nuevos o soporte técnico, escriba a <a href="mailto:soporte@imperium.pe" class="text-primary font-medium hover:underline">soporte@imperium.pe</a> o contáctenos al <span class="font-medium text-gray-700">01-397-8586</span> (anexo 101) o vía WhatsApp al <a href="#" class="text-primary font-medium hover:underline border-b border-primary/30">957 540 053</a>.
          </div>
        </form>
      </div>

    </div>
  </section>
</template>
