<!-- resources/js/Components/ContactSection.vue -->
<script setup>
import { computed } from 'vue'
import { useForm, usePage } from '@inertiajs/vue3'

const props = defineProps({
  bgImage: { type: String, default: '/img/contact-bg.jpg' }, // cámbialo por tu imagen
})

const page  = usePage()
const flash = computed(() => page.props.flash || {})

const form = useForm({
  name: '',
  phone: '',
  email: '',
  area: 'Arbitraje',
  message: '',
  privacy_ok: false,
  marketing_ok: false,
  website: '' // honeypot
})

const submit = () => {
  form.post('/contacto/enviar', {
    preserveScroll: true,
    onSuccess: () => form.reset('name','phone','email','message','privacy_ok','marketing_ok'),
  })
}
</script>

<template>
  <section
    id="contacto"
    class="relative"
    :style="`background-image:url('${props.bgImage}'); background-size:cover; background-position:center;`"
  >
    <!-- overlay oscuro -->
    <div class="absolute inset-0 bg-black/55"></div>

    <div class="relative max-w-7xl mx-auto px-4 py-16 lg:py-24">
      <div class="grid lg:grid-cols-2 gap-10 items-start">
        <!-- Columna izquierda: texto -->
        <div class="text-white">
          <h2 class="text-4xl md:text-5xl font-extrabold tracking-tight text-white">CONTACTO</h2>
          <p class="mt-4 max-w-xl text-white/90 text-lg font-medium">
            Para recibir una respuesta de nuestro equipo, te invitamos a ponerte en contacto con nosotros.
          </p>

          <!-- Mensajes flash -->
          <div v-if="flash.value?.success"
               class="mt-6 inline-block rounded-lg bg-emerald-500/10 text-emerald-100 border border-emerald-400/40 px-4 py-2">
            {{ flash.value.success }}
          </div>
          <div v-if="flash.value?.error"
               class="mt-6 inline-block rounded-lg bg-rose-500/10 text-rose-100 border border-rose-400/40 px-4 py-2">
            {{ flash.value.error }}
          </div>
        </div>

        <!-- Columna derecha: tarjeta formulario -->
        <form
          @submit.prevent="submit"
          class="bg-white/95 backdrop-blur rounded-2xl shadow-xl border border-white/40 p-5 sm:p-6 md:p-7 lg:p-8"
        >
          <!-- Honeypot -->
          <input v-model="form.website" type="text" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true" />

          <div class="grid sm:grid-cols-2 gap-4">
            <div>
              <label for="name" class="block text-sm font-semibold text-primary">Nombre y apellidos*</label>
              <input id="name" v-model="form.name" type="text" required
                     class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary">
              <p v-if="form.errors.name" class="mt-1 text-sm text-rose-600">{{ form.errors.name }}</p>
            </div>

            <div>
              <label for="phone" class="block text-sm font-semibold text-primary">Celular*</label>
              <input id="phone" v-model="form.phone" type="tel" required
                     class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary">
              <p v-if="form.errors.phone" class="mt-1 text-sm text-rose-600">{{ form.errors.phone }}</p>
            </div>
          </div>

          <div class="grid sm:grid-cols-2 gap-4 mt-4">
            <div>
              <label for="email" class="block text-sm font-semibold text-primary">Email*</label>
              <input id="email" v-model="form.email" type="email" required
                     class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary">
              <p v-if="form.errors.email" class="mt-1 text-sm text-rose-600">{{ form.errors.email }}</p>
            </div>

            <div>
              <label for="area" class="block text-sm font-semibold text-primary">Área de consulta*</label>
              <select id="area" v-model="form.area" required
                      class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary">
                <option>Arbitraje</option>
                <option>Conciliación</option>
                <option>JPRD</option>
                <option>Peritaje</option>
                <option>Otros</option>
              </select>
              <p v-if="form.errors.area" class="mt-1 text-sm text-rose-600">{{ form.errors.area }}</p>
            </div>
          </div>

          <div class="mt-4">
            <label for="message" class="block text-sm font-semibold text-primary">Mensaje*</label>
            <textarea id="message" v-model="form.message" rows="5" required
                      class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
            <p v-if="form.errors.message" class="mt-1 text-sm text-rose-600">{{ form.errors.message }}</p>
          </div>

          <div class="mt-4 space-y-2">
            <label class="flex items-start gap-2 text-sm">
              <input type="checkbox" v-model="form.privacy_ok" required class="mt-1 accent-primary">
              <span class="text-gray-700">
                Al enviar este formulario acepto que he leído y estoy de acuerdo con la
                <a href="/politica-privacidad" class="text-primary font-semibold underline">Política de Privacidad</a>.
              </span>
            </label>

            <label class="flex items-start gap-2 text-sm">
              <input type="checkbox" v-model="form.marketing_ok" class="mt-1 accent-primary">
              <span class="text-gray-700">
                Acepto que mis datos sean tratados para recibir comunicaciones comerciales.
              </span>
            </label>
          </div>

          <div class="pt-5">
            <button :disabled="form.processing || !form.privacy_ok"
                    class="w-full sm:w-auto inline-flex items-center justify-center rounded-lg bg-primary px-6 py-3 font-bold text-white hover:bg-primary/90 disabled:opacity-60 transition">
              <span v-if="!form.processing">ENVIAR</span>
              <span v-else>Enviando…</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>
</template>
