<script setup>
import { computed } from 'vue'
import { useForm, usePage } from '@inertiajs/vue3'

const page = usePage()
const flash = computed(() => page.props.flash || {})

const form = useForm({
  name: '',
  email: '',
  phone: '',
  message: '',
  website: '' // honeypot
})

const submit = () => {
  // Si cambiaste la ruta del backend a español, usa '/contacto/enviar'
  form.post('/contacto/enviar', {
    preserveScroll: true,
    onSuccess: () => form.reset('name', 'email', 'phone', 'message'),
  })
}
</script>

<template>
  <section id="contacto" class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid md:grid-cols-2 gap-10 items-start">
      <div>
        <h2 class="text-3xl font-extrabold">Contáctanos</h2>
        <p class="mt-2 text-neutral/70">
          Envíanos un mensaje y te responderemos a la brevedad.
        </p>

        <!-- Mensajes flash -->
        <div v-if="flash.value?.success" class="mt-4 rounded-lg bg-green-50 text-green-700 px-4 py-3">
          {{ flash.value.success }}
        </div>
        <div v-if="flash.value?.error" class="mt-4 rounded-lg bg-red-50 text-red-700 px-4 py-3">
          {{ flash.value.error }}
        </div>
      </div>

      <form @submit.prevent="submit" class="bg-white border border-neutral/10 rounded-2xl p-6 space-y-4">
        <!-- Honeypot (oculto a usuarios, visible a bots) -->
        <input v-model="form.website" type="text" tabindex="-1" autocomplete="off"
               class="hidden" aria-hidden="true" />

        <div>
          <label for="name" class="block text-sm font-medium">Nombre completo</label>
          <input id="name" v-model="form.name" type="text" required autocomplete="name"
                 class="mt-1 w-full rounded-md border border-neutral/20 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary" />
          <p v-if="form.errors.name" class="mt-1 text-sm text-red-600">{{ form.errors.name }}</p>
        </div>

        <div class="grid sm:grid-cols-2 gap-4">
          <div>
            <label for="email" class="block text-sm font-medium">Correo electrónico</label>
            <input id="email" v-model="form.email" type="email" required autocomplete="email"
                   class="mt-1 w-full rounded-md border border-neutral/20 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary" />
            <p v-if="form.errors.email" class="mt-1 text-sm text-red-600">{{ form.errors.email }}</p>
          </div>
          <div>
            <label for="phone" class="block text-sm font-medium">Teléfono (opcional)</label>
            <input id="phone" v-model="form.phone" type="tel" autocomplete="tel"
                   class="mt-1 w-full rounded-md border border-neutral/20 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary" />
            <p v-if="form.errors.phone" class="mt-1 text-sm text-red-600">{{ form.errors.phone }}</p>
          </div>
        </div>

        <div>
          <label for="message" class="block text-sm font-medium">Mensaje</label>
          <textarea id="message" v-model="form.message" rows="5" required
                    class="mt-1 w-full rounded-md border border-neutral/20 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
          <p v-if="form.errors.message" class="mt-1 text-sm text-red-600">{{ form.errors.message }}</p>
        </div>

        <div class="pt-2">
          <button :disabled="form.processing"
                  class="inline-flex items-center justify-center rounded-md bg-primary px-5 py-2.5 font-semibold text-white hover:bg-primary-dark disabled:opacity-60 transition-colors">
            <span v-if="!form.processing">Enviar mensaje</span>
            <span v-else>Enviando…</span>
          </button>
        </div>
      </form>
    </div>
  </section>
</template>
